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
            <th>id</th>
            <th>Nome</th>
            <th>Apelido</th>
            <th>Tipo do pet</th>
            <th>Dono do pet</th>
        </tr>
        <?php 
            include("../controllers/PetController.php");
            $controlador = new PetController();
            $collection_pets = $controlador->obterPet();
            foreach($collection_pets as $pet){
                echo "<td>{$pet->getId()}</td>";
                echo "<td>{$pet->getNomePet()}</td>";
                echo "<td>{$pet->getApelido()}</td>";
                echo "<td>{$pet->getTipoPet()}</td>";
                echo "<td>{$pet->getDonoPet()}</td>";
            }
        ?>

    </table>




</body>
</html>