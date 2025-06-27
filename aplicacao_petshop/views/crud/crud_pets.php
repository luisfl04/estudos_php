<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $username = $_SESSION['username'];
    include_once '../includes/header.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Pet.php';
    $petModel = new Pet("", "", "", 0, "");
    $pets = $petModel->listarPetsUsuario($username);
?>

<div class="container my-5" style="height: 100vh;">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">Gerenciamento de Pets</h2>
        <a href="../cadastro/cadastrar_pet.php" class="btn btn-sm btn-success">+ Cadastrar Novo Pet</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Raça</th>
                    <th>Apelido</th>
                    <th>Idade</th>
                    <th>Sexo</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pets)): ?>
                    <?php foreach ($pets as $pet): ?>
                        <tr>
                            <td><?= $pet->getId() ?></td>
                            <td><?= htmlspecialchars($pet->getNomeTipoPet($pet->getTipoPet()))?></td>
                            <td><?= htmlspecialchars($pet->getRaca()) ?></td>
                            <td><?= htmlspecialchars($pet->getApelido()) ?></td>
                            <td><?= htmlspecialchars($pet->getIdade()) ?> anos</td>
                            <td><?php if(htmlspecialchars($pet->getSexo()) === 'M'){
                                    echo "Macho";
                                }else{
                                    echo "Fêmea";
                                }
                            ?></td>
                            <td class="text-center">
                                <a href="/estudos_php/aplicacao_petshop/views/atualizacao/atualizar_pet.php?id_pet=<?= $pet->getId() ?>" class="btn btn-sm btn-warning me-1">Editar</a>
                                <a href="/estudos_php/aplicacao_petshop/controllers/PetController.php?remover=<?= $pet->getId() ?>" class="btn btn-sm btn-danger"
                                   onclick="return confirm('Tem certeza que deseja remover este pet?')">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Nenhum pet cadastrado até o momento.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once '../includes/footer.php'; ?>
