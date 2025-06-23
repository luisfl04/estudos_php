<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de cadastro</title>
    <?php 
        // include $_SERVER['DOCUMENT_ROOT'] . '/aplicacao_petshop/views/includes/cdn.php';
        include('./includes/cdn.php');
    ?>
</head>
<body>

    <h1>Cadastro de Pet</h1>

    <form action="../controllers/PetController.php" method="post">

        <div class="fw-bold text-center">Insira as informações abaixo</div>

        <div class="column">
            <div class="mb-2">
                <label for="nome_do_pet" class="form-label">Nome do seu pet:</label> 
                <input class="form-control" type="text" name="nome_do_pet" id="nome_do_pet">
            </div>    

             <div class="mb-2">
                <label for="apelido" class="form-label">Apelido do pet:</label> 
                <input class="form-control" type="text" name="apelido" id="apelido">
            </div>    
            
            <div class="mb-2">
                <label for="tipo_do_pet" class="form-label">Tipo do pet:</label> 
                 <input class="form-control" type="number" name="tipo_do_pet" id="tipo_do_pet">
            </div>    
            
            <div class="mb-2">
                <label for="dono_do_pet" class="form-label">Selecione o dono do pet:</label> 
                <select name="dono_do_pet" id="dono_do_pet" class="form-select">
                    <option value="Joao">João</option>
                </select>
            </div>    

        </div>

        <div class="mt-1 text-center">
            <input type="submit" value="Cadastrar">
        </div>
    
    </form>
</body>
</html>