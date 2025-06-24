<?php
require_once 'banco_de_dados/ControladorBanco.php';
require_once 'models/Pet.php';
require_once 'models/Veterinario.php';
require_once 'models/Vacina.php';

class AgendamentoVacina {
    private int $id_agendamento_vacina;
    private Pet $pet;
    private Veterinario $veterinario;
    private Vacina $vacina;
    private string $data_agendamento;
    private string $data_realizacao;

    private ControladorBanco $controlador_banco;

    public function __construct(Pet $pet, Veterinario $veterinario, Vacina $vacina, string $data_agendamento) {
        $this->pet = $pet;
        $this->veterinario = $veterinario;
        $this->vacina = $vacina;
        $this->data_agendamento = $data_agendamento;
        $this->data_realizacao = "";

        $this->controlador_banco = new ControladorBanco();
    }

    // Getters
    public function getPet(): Pet {
        return $this->pet;
    }

    public function getVeterinario(): Veterinario {
        return $this->veterinario;
    }

    public function getVacina(): Vacina {
        return $this->vacina;
    }

    public function getDataAgendamento(): string {
        return $this->data_agendamento;
    }

    public function getDataRealizacao(): string {
        return $this->data_realizacao;
    }

    // Setters
    public function setDataAgendamento(string $nova_data): void {
        $this->data_agendamento = $nova_data;
    }

    public function setDataRealizacao(string $data_realizacao): void {
        $this->data_realizacao = $data_realizacao;
    }

    public function setVeterinario(Veterinario $veterinario_novo): void {
        $this->veterinario = $veterinario_novo;
    }

    // Métodos de banco
    public function cadastrarAgendamentoVacinaBanco(): void {
        $sql = "
            INSERT INTO agendamento_vacina (pet_id, veterinario_id, vacina_id, data_agendamento, data_realizacao)
            VALUES (
                {$this->pet->getId()}, 
                {$this->veterinario->getId()}, 
                {$this->vacina->getId()}, 
                '{$this->getDataAgendamento()}', 
                '{$this->getDataRealizacao()}'
            );
        ";
        $this->controlador_banco->cadastrarDados($sql);
    }

    public function consultarAgendamentoVacinaBanco(): array {
        $sql = "SELECT * FROM view_agendamento_vacina"; // ou tabela diretamente
        return $this->controlador_banco->consultarValoresBanco($sql);
    }

    public function consultarAgendamentosPorVeterinario(int $id_vet): array {
        $sql = "
            SELECT 
                agendamento_vacina.*,
                pet.apelido AS apelido_pet,
                vacina.nome AS nome_vacina
            FROM agendamento_vacina
            JOIN pet ON pet.id = agendamento_vacina.pet_id
            JOIN vacina ON vacina.id_vacina = agendamento_vacina.vacina_id
            WHERE agendamento_vacina.veterinario_id = {$id_vet}
        ";

        return $this->controlador_banco->consultarValoresBanco($sql);
    }

    public function realizarVacina(int $id_agendamento): void {
        $data_realizacao = date('Y-m-d');
        $sql = "UPDATE agendamento_vacina SET data_realizacao = '{$data_realizacao}' WHERE id_agendamento = {$id_agendamento}";
        $this->controlador_banco->consultarValoresBanco($sql);    
    }

    public function excluirAgendamentoVacina(int $id_agendamento): void {
        $sql = "DELETE FROM agendamento_vacina WHERE id_agendamento = {$id_agendamento}";
        $this->controlador_banco->cadastrarDados($sql);
    }

}
