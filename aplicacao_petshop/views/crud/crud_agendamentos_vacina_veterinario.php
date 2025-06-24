<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/AgendamentoVacina.php';

// Simulação do ID do veterinário logado (você pode substituir por sessão depois)
$id_veterinario_logado = 1;

$agendamentoModel = new AgendamentoVacina();
$agendamentos = $agendamentoModel->consultarAgendamentosPorVeterinario($id_veterinario_logado); // método que você vai criar
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendamentos - Veterinário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <h2>Meus Agendamentos de Vacinas</h2>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>Pet</th>
                <th>Vacina</th>
                <th>Data Agendada</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($agendamentos as $a): ?>
            <tr>
                <td><?= $a['apelido_pet'] ?? 'N/A' ?></td>
                <td><?= $a['nome_vacina'] ?? 'N/A' ?></td>
                <td><?= $a['data_agendamento'] ?></td>
                <td>
                    <?= empty($a['data_realizacao']) ? '<span class="badge bg-warning">Pendente</span>' : '<span class="badge bg-success">Realizada</span>' ?>
                </td>
                <td>
                    <!-- Botões de ação serão implementados depois -->
                    <a href="#" class="btn btn-success btn-sm disabled">Realizar</a>
                    <a href="#" class="btn btn-danger btn-sm disabled">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
