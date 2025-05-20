<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de cadastro</title>
    <?php 
        include('../includes/cdn.php');
    ?>
</head>
<body>

    <h1>cadastro de Pet</h1>

    <form action="../controllers/PetController.php" method="post">

        <div class="">Insira as informações abaixo</div>

        <div class="">

            <input type="text" name="nome_do_pet">
            <input type="text" name="apelido">
            <input type="number" name="tipo_do_pet">
            <input type="number" name="dono_do_pet">
        </div>

        <div class="">
            <input type="submit" value="Cadastrar">
        </div>
    
    </form>
</body>
</html>