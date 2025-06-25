<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/collection/AgendamentoVacinaCollection.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/banco_de_dados/ControladorBanco.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Pet.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Veterinario.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Vacina.php';

class AgendamentoVacina {
    private int $id_agendamento_vacina;
    private int $usuario_relacionado_id;
    private int $pet_id;
    private int $veterinario_id;
    private int $vacina_id;
    private string $data_agendamento;
    private string $data_realizacao;
    private string $status_agendamento;

    private ControladorBanco $controlador_banco;
    private AgendamentoVacinaCollection $agendamento_vacina_collection;


    public function __construct(int $pet_id, int $veterinario_id, int $vacina_id, string $data_agendamento, int $usuario_relacionado_id) {
        $this->id_agendamento_vacina = 0;
        $this->pet_id = $pet_id;
        $this->veterinario_id = $veterinario_id;
        $this->vacina_id = $vacina_id;
        $this->data_agendamento = $data_agendamento;
        $this->data_realizacao = "";
        $this->usuario_relacionado_id = $usuario_relacionado_id;
        $this->status_agendamento = "agendado";
        $this-> agendamento_vacina_collection = new AgendamentoVacinaCollection();
        $this->controlador_banco = new ControladorBanco();
    }

    // Getters
    public function getId(): int{
        return $this->id_agendamento_vacina;
    }

    public function getUsuarioRelacionadoId(): int{
        $id_usuario = (int)$this->usuario_relacionado_id;
        return $id_usuario;
    }

    public function getPetId(): int{
        return $this->pet_id;
    }

    public function getVeterinarioId(): int {
        return $this->veterinario_id;
    }

    public function getVacinaId(): int {
        return $this->vacina_id;
    }

    public function getDataAgendamento(): string {
        return $this->data_agendamento;
    }

    public function getDataRealizacao(): string {
        return $this->data_realizacao;
    }

    public function getStatusAgendamento(): string {
        return $this->status_agendamento;
    }

    // Setters
    public function setId($novo_id): void{
        $this->id_agendamento_vacina = $novo_id;
    }

    public function setDataAgendamento(string $nova_data): void {
        $this->data_agendamento = $nova_data;
    }

    public function setDataRealizacao(string $data_realizacao): void {
        $this->data_realizacao = $data_realizacao;
    }

    public function setStatusAgendamento($novo_status): void {
        $this->status_agendamento = $novo_status;
    }

    // Métodos de banco
    public function cadastrarAgendamentoVacinaBanco(): void {
        $sql = "
            INSERT INTO agendamento_vacina (pet_id, veterinario_id, vacina_id, data_agendamento, status_agendamento, usuario_relacionado_id)
            VALUES (
                {$this->getPetId()}, 
                {$this->getVeterinarioId()}, 
                {$this->getVacinaId()}, 
                '{$this->getDataAgendamento()}',
                'agendado',
                '{$this->getUsuarioRelacionadoId()}'
            );
        ";
        $this->controlador_banco->cadastrarDados($sql);
    }

    public function consultarAgendamentoVacinaBancoUsuario(): array {
        $sql = "
        SELECT * FROM agendamento_vacina
        WHERE usuario_relacionado_id='{$this->getUsuarioRelacionadoId()}' 
        ";

        $valores_banco = $this->controlador_banco->consultarValoresBanco($sql);
        $objetos =  $this->criarCollection($valores_banco);
        return $objetos;
    }

    public function consultarAgendamentoVacinaBancoVeterinario($id_veterinario): array {
        $sql = "
            SELECT * FROM agendamento_vacina
            WHERE veterinario_id='{$id_veterinario}' 
        ";

        $valores_banco = $this->controlador_banco->consultarValoresBanco($sql);
        $objetos =  $this->criarCollection($valores_banco);
        return $objetos;
    }

    public function realizarAgendamentoVacina(int $id_agendamento): void {
        $data_realizacao = date('Y-m-d');
        $sql = " 
            UPDATE agendamento_vacina 
            SET data_realizacao = '{$data_realizacao}', status_agendamento='realizado'
            WHERE id_agendamento_vacina = {$id_agendamento}";
            $this->controlador_banco->autenticarValorBanco($sql);    
    }

    public function excluirAgendamentoVacina(int $id_agendamento): void {
        $sql = "
        DELETE FROM agendamento_vacina 
        WHERE id_agendamento_vacina = {$id_agendamento}";
        $this->controlador_banco->autenticarValorBanco($sql);
    }

    public function obterNomePet(): string {
        $pet = new Pet("", "", "", 0, "");
        $dados_pet = $pet->buscarPorId($this->pet_id);
        return $dados_pet['apelido'] ?? 'Pet não encontrado';
    }

    public function obterNomeVacina(): string {
        $vacina = new Vacina("", 0, "", 0.0);
        $dados_vacina = $vacina->buscarPorId($this->vacina_id);
        return $dados_vacina['nome_tipo'] ?? 'Vacina não encontrada';
    }

    public function obterNomeVeterinario(): string {
        $veterinario = new Veterinario("", "", "","", "", "", "", "");
        $dados_veterinario = $veterinario->buscarPorId($this->veterinario_id);
        return $dados_veterinario['nome'] ?? 'Veterinário não encontrado';
    }

    public function criarCollection($valores_banco) : array {
        return $this->agendamento_vacina_collection->criarCollection($valores_banco);
    }


}
