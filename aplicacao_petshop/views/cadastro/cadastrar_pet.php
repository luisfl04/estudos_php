<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="../controllers/PetController.php" method="POST">
<input type="hidden" name="acao" value="cadastrar">
<!-- Campos tipo_pet, raca, apelido, idade, sexo -->
<button type="submit">Salvar</button>
</form>
</body>
</html>