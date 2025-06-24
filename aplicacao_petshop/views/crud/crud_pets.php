<?php
require_once '../models/Pet.php';
$petModel = new Pet();
$pets = $petModel->listar();
?>
<a href="cadastrar_pet.php" class="btn btn-success">Cadastrar Novo Pet</a>
<table class="table">
<tr><th>ID</th><th>Tipo</th><th>Raça</th><th>Apelido</th><th>Idade</th><th>Sexo</th><th>Ações</th></tr>
<?php foreach ($pets as $pet): ?>
<tr>
<td><?= $pet['id'] ?></td>
<td><?= $pet['tipo_pet'] ?></td>
<td><?= $pet['raca'] ?></td>
<td><?= $pet['apelido'] ?></td>
<td><?= $pet['idade'] ?></td>
<td><?= $pet['sexo'] ?></td>
<td>
<a href="atualizar_pet.php?id=<?= $pet['id'] ?>" class="btn btn-warning">Editar</a>
<a href="../controllers/PetController.php?remover=<?= $pet['id'] ?>" class="btn btn-danger">Remover</a>
</td>
</tr>
<?php endforeach; ?>
</table>
*/
