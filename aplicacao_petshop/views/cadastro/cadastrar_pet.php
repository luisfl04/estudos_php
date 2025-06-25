<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$id_usuario = $_SESSION['id_usuario'];
include_once '../includes/header.php';
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Cadastro de Pet</h2>

    <form action="../../controllers/PetController.php" method="POST" class="p-4 shadow rounded bg-light">
        <input type="hidden" name="acao" value="cadastrar">
        <input type="hidden" name="id_usuario" value="<?=$id_usuario?>">

        <div class="mb-3">
            <label for="tipo_pet" class="form-label">Tipo do Pet</label>
            <select name="tipo_pet" id="tipo_pet" class="form-select" required>
                <option value="">Selecione</option>
                <option value="1">Cachorro</option>
                <option value="2">Gato</option>
                <option value="3">Cavalo</option>
                <option value="4">Pássaro</option>
                <option value="5">Gado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="raca" class="form-label">Raça</label>
            <input type="text" name="raca" id="raca" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="apelido" class="form-label">Apelido</label>
            <input type="text" name="apelido" id="apelido" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="idade" class="form-label">Idade</label>
            <input type="number" name="idade" id="idade" class="form-control" required min="0">
        </div>

        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select name="sexo" id="sexo" class="form-select" required>
                <option value="">Selecione</option>
                <option value="M">Macho</option>
                <option value="F">Fêmea</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">Cadastrar Pet</button>
    
    </form>
</div>

<?php
include_once '../includes/footer.php';
?>
