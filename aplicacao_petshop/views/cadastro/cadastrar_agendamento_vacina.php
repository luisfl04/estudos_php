<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Pet.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Vacina.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Veterinario.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/views/includes/debug_erro.php';


$petModel = new Pet("", "", "", 0, "");
$vacinaModel = new Vacina("", 0, "", 0.0);
$veterinarioModel = new Veterinario("", "", "", "", "", "", "", "");

$pets = $petModel->consultarPetBanco();
$vacinas = $vacinaModel->consultarVacinaBanco();
$veterinarios = $veterinarioModel->consultarVeterinarioBanco();
?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/views/includes/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Agendar Vacina</h2>

    <form action="../controllers/AgendamentoVacinaController.php" method="POST">
        <input type="hidden" name="acao" value="cadastrar">

        <div class="mb-3">
            <label for="id_pet" class="form-label">Pet</label>
            <select name="id_pet" class="form-select" required>
                <option value="" disabled selected>Selecione o pet</option>
                <?php foreach($pets as $pet): ?>
                    <option value="<?= $pet['id_pet'] ?>">
                        <?= htmlspecialchars($pet['apelido']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_vacina" class="form-label">Vacina</label>
            <select name="id_vacina" class="form-select" required>
                <option value="" disabled selected>Selecione a vacina</option>
                <?php foreach($vacinas as $vacina): ?>
                    <option value="<?= $vacina['id_vacina'] ?>">
                        <?= htmlspecialchars($vacina['nome_tipo']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_veterinario" class="form-label">Veterinário</label>
            <select name="id_veterinario" class="form-select" required>
                <option value="" disabled selected>Selecione o veterinário</option>
                <?php foreach($veterinarios as $vet): ?>
                    <option value="<?= $vet['id_veterinario'] ?>">
                        <?= htmlspecialchars($vet['nome']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="data_agendamento" class="form-label">Data do Agendamento</label>
            <input type="date" name="data_agendamento" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Agendar Vacina</button>
    </form>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/views/includes/footer.php'; ?>
