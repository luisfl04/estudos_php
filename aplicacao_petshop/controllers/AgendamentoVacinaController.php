<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/AgendamentoVacina.php';
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
        // Criar objeto de Agendamento
        $agendamento = new AgendamentoVacina(
            $dados['id_pet'],
            $dados['id_veterinario'],
            $dados['id_vacina'],
            $dados['data_agendamento'],
            $dados['id_usuario_relacionado']
        );

        // Persistir no banco
        $agendamento->cadastrarAgendamentoVacinaBanco();
    }

    public function consultarAgendamentoVacinaUsuarioBanco(){
        return $this->agendamento_vacina->consultarAgendamentoVacinaBancoUsuario();
    }

    public function consultarAgendamentoVacinaBancoVeterinario($id_veterinario){
        return $this->agendamento_vacina->consultarAgendamentoVacinaBancoVeterinario($id_veterinario);
    }

    public function realizarAgendamentoVacina($id_agendamento){
        $this->agendamento_vacina->realizarAgendamentoVacina($id_agendamento);
    }

    public function excluirAgendamentoVacina($id_agendamento){
        $this->agendamento_vacina->excluirAgendamentoVacina($id_agendamento);       
    }


}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['acao'] === 'cadastrar') {
    $controller = new AgendamentoVacinaController();
    $controller->cadastrarAgendamentoVacinaFromRequest($_POST);
    header("Location: /estudos_php/aplicacao_petshop/views/crud/crud_agendamentos_vacina_cliente.php");
    exit;
}else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['realizar'])){
        $id_agendamento = intval($_GET['realizar']);
        $modelo = new AgendamentoVacina(0,0,0,"", 0);
        $controller_agendamento = new AgendamentoVacinaController($modelo);
        $controller_agendamento->realizarAgendamentoVacina($id_agendamento);
        
        header("Location: /estudos_php/aplicacao_petshop/views/crud/crud_agendamentos_vacina_veterinario.php");
        exit;
    }
    else if(isset($_GET['excluir'])){
        $id_agendamento = intval($_GET['excluir']);
        $modelo = new AgendamentoVacina(0,0,0,"", 0);
        $controller_agendamento = new AgendamentoVacinaController($modelo);
        $controller_agendamento->excluirAgendamentoVacina($id_agendamento);
        header("Location: /estudos_php/aplicacao_petshop/views/crud/crud_agendamentos_vacina_veterinario.php");
        exit;
    }
}

?>