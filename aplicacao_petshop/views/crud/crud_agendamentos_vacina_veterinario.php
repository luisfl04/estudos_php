<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id_veterinario = $_SESSION['id_veterinario'];

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/AgendamentoVacina.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/controllers/AgendamentoVacinaController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/views/includes/header.php';
;
$agendamento = new AgendamentoVacina(0, 0, 0, "", 0);
$controller_vacina = new AgendamentoVacinaController($agendamento);
$agendamentos = $controller_vacina->consultarAgendamentoVacinaBancoVeterinario($id_veterinario); 
?>

<div class="container my-5" style="height:80vh;">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Agendamentos de Vacinas</h2>
        <div>
            <a href="/estudos_php/aplicacao_petshop/views/dashboards/dashboard_veterinario.php"  class="btn btn-secondary">Voltar</a>
            <a href="/estudos_php/aplicacao_petshop/views/relatorios/relatorio_agendamento_vacina_veterinario.php" target="_blank" class="btn btn-primary">Gerar Relatório PDF</a>
        </div>
    </div>

    <?php if (!empty($agendamentos)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Pet</th>
                        <th>Vacina</th>
                        <th>Data Agendamento</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agendamentos as $agendamento): ?>
                        <tr>
                            <td><?= $agendamento->obterNomePet() ?? 'N/A' ?></td>
                            <td><?= $agendamento->obterNomeVacina() ?? 'N/A' ?></td>
                            <td><?= date('d/m/Y', strtotime($agendamento->getDataAgendamento())) ?></td>
                            <td><?= $agendamento->getStatusAgendamento() ?></td>
                            <td>
                                <?php if($agendamento->getStatusAgendamento() === 'realizado'): ?>
                                    <a class="btn btn-success disabled btn-sm me-1" >Realizar Vacina</a>
                                    <a href="/estudos_php/aplicacao_petshop/controllers/AgendamentoVacinaController.php?excluir=<?=$agendamento->getId() ?>" class="btn btn-danger btn-sm">Excluir Vacina</a>
                                <?php else: ?>
                                    <a href="/estudos_php/aplicacao_petshop/controllers/AgendamentoVacinaController.php?realizar=<?=$agendamento->getId() ?>" class="btn btn-success btn-sm me-1">Realizar Vacina</a>
                                    <a href="/estudos_php/aplicacao_petshop/controllers/AgendamentoVacinaController.php?excluir=<?=$agendamento->getId() ?>" class="btn btn-danger btn-sm">Excluir Vacina</a>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center" role="alert">
            Nenhum agendamento de vacina encontrado.
        </div>
    <?php endif; ?>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/views/includes/footer.php'; ?>
