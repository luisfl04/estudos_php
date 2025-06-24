<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/AgendamentoVacina.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Pet.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Vacina.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Veterinario.php';

class AgendamentoVacinaController {
    protected AgendamentoVacina $agendamento_vacina;

    // Construtor usado somente para exibir dados, não para cadastro
    public function __construct(AgendamentoVacina $agendamento_vacina = null) {
        if ($agendamento_vacina) {
            $this->agendamento_vacina = $agendamento_vacina;
        }
    }

    // Cadastrar agendamento no banco a partir dos dados do formulário
    public function cadastrarAgendamentoVacinaFromRequest(array $dados): void {
        // Instanciar objetos relacionados com base nos IDs
        $petModel = new Pet();
        $vacinaModel = new Vacina();
        $veterinarioModel = new Veterinario();

        $pet_data = $petModel->buscarPorId($dados['pet_id']);
        $vacina_data = $vacinaModel->buscarPorId($dados['vacina_id']);
        $veterinario_data = $veterinarioModel->buscarPorId($dados['veterinario_id']);

        // Criar objetos reais a partir dos dados do banco
        $pet = new Pet();
        $pet->preencherDados($pet_data); // método auxiliar que você precisa criar no modelo Pet

        $vacina = new Vacina(
            $vacina_data['nome'],
            $vacina_data['tipo_pet'],
            $vacina_data['descricao'],
            $vacina_data['valor']
        );

        $veterinario = new Veterinario(
            endereco: null, // caso não precise carregar endereço agora
            numero_crmv: $veterinario_data['numero_crmv'],
            nome: $veterinario_data['nome'],
            telefone: $veterinario_data['telefone'],
            cpf: $veterinario_data['cpf'],
            data_nascimento: $veterinario_data['data_nascimento'],
            sexo: $veterinario_data['sexo']
        );

        // Criar objeto de Agendamento
        $agendamento = new AgendamentoVacina(
            $pet,
            $veterinario,
            $vacina,
            $dados['data_agendamento']
        );

        // Persistir no banco
        $agendamento->cadastrarAgendamentoVacinaBanco();
    }

    // Obter todos os agendamentos cadastrados
    public function obterAgendamentosVacinas(): array {
        $agendamento = new AgendamentoVacina(null, null, null, '');
        $valores = $agendamento->consultarAgendamentoVacinaBanco();
        return $agendamento->criarCollection($valores);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['acao'] === 'cadastrar') {
    $controller = new AgendamentoVacinaController();
    $controller->cadastrarAgendamentoVacinaFromRequest($_POST);
    header("Location: ../views/crud_agendamentos.php");
    exit;
}

?>