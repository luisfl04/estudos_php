<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    include $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Pet.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/controllers/PetController.php';

    $id_pet = $_GET['id_pet'] ?? null;
    if (!$id_pet) {
        echo "ID do pet não informado.";
        exit;
    }

    $pet = new Pet();
    $dados_pet = $pet->buscarPorId($id_pet);

    if($dados_pet['tipo_pet_id'] === 1){
        $tipo_pet = "cachorro";
    }
    else if($dados_pet['tipo_pet_id'] === 2){
        $tipo_pet = "gato";
    }
    else if($dados_pet['tipo_pet_id'] === 3){
        $tipo_pet = "cavalo";
    }
    else if($dados_pet['tipo_pet_id'] === 4){
        $tipo_pet = "passaro";
    }
    else{
        $tipo_pet = "gado";
    }

?>

<?php include '../includes/header.php'; ?>

<div class="container mt-5" style="height: 100vh;">
    <h3 class="text-center mb-4">Atualizar Pet</h3>

    <form action="../../controllers/PetController.php" method="POST">
        <input type="hidden" name="acao" value="atualizar">
        <input type="hidden" name="id_pet" value="<?= $dados_pet['id_pet'] ?>">

        <div class="mb-3">
            <label class="form-label">Apelido:</label>
            <input type="text" name="apelido" class="form-control" value="<?= $dados_pet['apelido'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Raça:</label>
            <input type="text" name="raca" class="form-control" value="<?= $dados_pet['raca_pet'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo:</label>
            <select name="tipo_pet" class="form-select" required>
                <option value="1" <?= $tipo_pet === 'cachorro' ? 'selected' : '' ?>>cachorro</option>
                <option value="2" <?= $tipo_pet === 'gato' ? 'selected' : '' ?>>gato</option>
                <option value="3" <?= $tipo_pet === 'cavalo' ? 'selected' : '' ?>>cavalo</option>
                <option value="4" <?= $tipo_pet === 'passaro' ? 'selected' : '' ?>>pássaro</option>
                <option value="5" <?= $tipo_pet === 'gado' ? 'selected' : '' ?>>gado</option>                
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Idade:</label>
            <input type="number" name="idade" class="form-control" value="<?= $dados_pet['idade'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Sexo:</label>
            <select name="sexo" class="form-select" required>
                <option value="M" <?= $dados_pet['sexo'] === 'M' ? 'selected' : '' ?>>Macho</option>
                <option value="F" <?= $dados_pet['sexo'] === 'F' ? 'selected' : '' ?>>Fêmea</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="/estudos_php/aplicacao_petshop/views/crud/crud_pets.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include 'estudos_php/aplicacao_petshop/views/includes/footer.php'; ?>
