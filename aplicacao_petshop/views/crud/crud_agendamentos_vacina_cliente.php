<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$id_usuario = $_SESSION['id_usuario'];

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/AgendamentoVacina.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/views/includes/header.php';
;

$agendamento = new AgendamentoVacina(0, 0, 0, "", $id_usuario);
$agendamentos = $agendamento->consultarAgendamentoVacinaBancoUsuario(); 
?>

<div class="container my-5" style="height:80vh;">
    
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold">Meus Agendamentos de Vacinas</h2>
        
        <div>
            <a href="/estudos_php/aplicacao_petshop/views/cadastro/cadastrar_agendamento_vacina.php" class="btn btn-sm btn-success me-2">Agendar Nova Vacina</a>
            <a href="/estudos_php/aplicacao_petshop/views/relatorios/relatorio_agendamento_vacina_cliente.php" target="_blank" class="btn btn-sm btn-primary">Gerar Relatório PDF</a>
        </div>
    
    </div>

    <?php if (!empty($agendamentos)): ?>
        
        <div class="table-responsive">
            
            <table class="table table-bordered table-hover align-middle text-center">
                
                <thead class="table-dark">
                    <tr>
                        <th>Pet</th>
                        <th>Vacina</th>
                        <th>Veterinário</th>
                        <th>Data Agendamento</th>
                        <th>Data Realização</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php foreach ($agendamentos as $agendamento): ?>
                        <tr>
                            <td><?= $agendamento->obterNomePet() ?? 'N/A' ?></td>
                            <td><?= $agendamento->obterNomeVacina() ?? 'N/A' ?></td>
                            <td><?= $agendamento->ObterNomeVeterinario() ?? 'N/A' ?></td>
                            <td><?= date('d/m/Y', strtotime($agendamento->getDataAgendamento())) ?></td>
                            <td>
                                <?= $agendamento->getDataRealizacao() 
                                    ? date('d/m/Y', strtotime($agendamento->getDataRealizacao())) 
                                    : '<span class="text-muted">Pendente</span>';
                                ?>
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
