<?php
// Inclui modelos para popular os selects
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Pet.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Vacina.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Veterinario.php';

// Instancia modelos
$petModel = new Pet();
$veterinarioModel = new Veterinario();
$vacinaModel = new Vacina();

// Consulta dados
$pets = $petModel->listar();
$veterinarios = $veterinarioModel->consultarVeterinarioBanco();
$vacinas = $vacinaModel->consultarVacinaBanco();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendar Vacina</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2>Agendar Vacina</h2>

    <form action="../controllers/AgendamentoVacinaController.php" method="POST">
        <input type="hidden" name="acao" value="cadastrar">

        <!-- Seleção do PET -->
        <div class="mb-3">
            <label for="pet_id" class="form-label">Pet</label>
            <select name="pet_id" id="pet_id" class="form-select" required>
                <option value="">Selecione o pet</option>
                <?php foreach ($pets as $pet): ?>
                    <option value="<?= $pet['id'] ?>"><?= $pet['apelido'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Seleção do VETERINÁRIO -->
        <div class="mb-3">
            <label for="veterinario_id" class="form-label">Veterinário</label>
            <select name="veterinario_id" id="veterinario_id" class="form-select" required>
                <option value="">Selecione o veterinário</option>
                <?php foreach ($veterinarios as $vet): ?>
                    <option value="<?= $vet['id_veterinario'] ?>"><?= $vet['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Seleção da VACINA -->
        <div class="mb-3">
            <label for="vacina_id" class="form-label">Vacina</label>
            <select name="vacina_id" id="vacina_id" class="form-select" required>
                <option value="">Selecione a vacina</option>
                <?php foreach ($vacinas as $vac): ?>
                    <option value="<?= $vac['id_vacina'] ?>"><?= $vac['nome'] ?> - <?= $vac['tipo_pet'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Data de Agendamento -->
        <div class="mb-3">
            <label for="data_agendamento" class="form-label">Data de Agendamento</label>
            <input type="date" name="data_agendamento" id="data_agendamento" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Agendar Vacina</button>
        <a href="crud_agendamentos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
