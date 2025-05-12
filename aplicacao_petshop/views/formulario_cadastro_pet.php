<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de cadastro</title>
</head>
<body>

    <form action="usuario_controller.php" method="post">
        <input type="text" name="nome_do_pet">
        <input type="text" name="apelido">
        <input type="number" name="tipo_do_pet">
        <input type="number" name="dono_do_pet">
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>