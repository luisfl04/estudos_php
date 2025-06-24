<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once '../models/Pet.php';
    $petModel = new Pet();
    $pet = $petModel->buscarPorId($_GET['id']);
    ?>
    
    <form action="../controllers/PetController.php" method="POST">
        <input type="hidden" name="acao" value="atualizar">
        <input type="hidden" name="id" value="<?= $pet['id'] ?>">
        <!-- Campos preenchidos com valores do pet -->
        <button type="submit">Atualizar</button>
    </form>
    
</body>
</html>