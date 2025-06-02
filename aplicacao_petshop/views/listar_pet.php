<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Listagem de Pets</h1>

    <table>
        <tr>
            <th>Nome</th>
            <th>Apelido</th>
            <th>Tipo do pet</th>
            <th>Dono do pet</th>
        </tr>
        <?php 
            include("../controllers/PetController.php");
            $controlador = new PetController();
            $pets =  $controlador->obterPet();
            foreach($pets as $pet){
                echo "<td>{$pet->getNomePet()}</td>";
                echo "<td>{$pet->getApelido()}</td>";
                echo "<td>{$pet->getTipoPet()}</td>";
                echo "<td>{$pet->getDonoPet()}</td>";
                echo "<td><a href=''>Editar pet</a></td>";
            }
        ?>

    </table>




</body>
</html>