<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/AgendamentoVacina.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Pet.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Vacina.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Veterinario.php';

$agendamento = new AgendamentoVacina();
$agendamentos = $agendamento->consultarAgendamentoVacinaBanco(); // Retorna array associativo com dados das tabelas relacionadas

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendamentos de Vacinas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2 class="mb-4">Meus Agendamentos de Vacinas</h2>

    <div class="mb-3">
        <a href="form_agendar_vacina.php" class="btn btn-success">Agendar Nova Vacina</a>   
        <a href="relatorio_vacinas.php" class="btn btn-primary" target="_blank">Gerar Relatório PDF</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Pet</th>
                <th>Vacina</th>
                <th>Veterinário</th>
                <th>Data Agendamento</th>
                <th>Data Realização</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agendamentos as $registro): ?>
                <tr>
                    <td><?= $registro['apelido_pet'] ?? 'N/A' ?></td>
                    <td><?= $registro['nome_vacina'] ?? 'N/A' ?></td>
                    <td><?= $registro['nome_veterinario'] ?? 'N/A' ?></td>
                    <td><?= $registro['data_agendamento'] ?></td>
                    <td><?= $registro['data_realizacao'] ?? '-' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</body>
</html>
