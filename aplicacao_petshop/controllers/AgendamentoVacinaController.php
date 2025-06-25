<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/AgendamentoVacina.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Pet.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Vacina.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Veterinario.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/views/includes/debug_erro.php';

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
        $petModel = new Pet("", " ", "", 0, "");
        $vacinaModel = new Vacina("", 0, "", 0.0);
        $veterinarioModel = new Veterinario("", "", "", "", "", "", "", "");

        // Criar objeto de Agendamento
        $agendamento = new AgendamentoVacina(
            $dados['id_pet'],
            $dados['id_veterinario'],
            $dados['id_vacina'],
            $dados['data_agendamento']
        );

        // Persistir no banco
        $agendamento->cadastrarAgendamentoVacinaBanco();
    }

    // // Obter todos os agendamentos cadastrados
    // public function obterAgendamentosVacinas(): array {
    //     $agendamento = new AgendamentoVacina(null, null, null, '');
    //     $valores = $agendamento->consultarAgendamentoVacinaBanco();
    //     return $agendamento->criarCollection($valores);
    // }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['acao'] === 'cadastrar') {
    $controller = new AgendamentoVacinaController();
    $controller->cadastrarAgendamentoVacinaFromRequest($_POST);
    header("Location: /estudos_php/aplicacao_petshop/views/crud/crud_agendamentos_vacina_cliente.php");
    exit;
}


// // Lógica chamada via GET para realizar vacina
// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//     if(isset($_GET['realizar'])){
    
//         $id = intval($_GET['realizar']);
    
//         $modelo = new AgendamentoVacina();
//         $modelo->realizarVacina($id);
    
//         header("Location: ../views/crud_agendamentos_veterinario.php");
//         exit;
//     }
//     else if(isset($_GET['excluir'])){
//         $id = intval($_GET['excluir']);

//         $modelo = new AgendamentoVacina();
//         $modelo->excluirAgendamentoVacina($id);

//         header("Location: ../views/crud_agendamentos_veterinario.php");
//         exit;
//     }
// }


?>