<?php
    session_start();
    $username = $_SESSION['nome_usuario'];
    include_once '../includes/header.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Pet.php';
    $petModel = new Pet("", "", "", 0, "");
    $pets = $petModel->listarPetsUsuario($username);
?>

<div class="container my-5">
    <!-- Título -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">Gerenciamento de Pets</h2>
        <a href="cadastrar_pet.php" class="btn btn-success">+ Cadastrar Novo Pet</a>
    </div>

    <!-- Tabela de pets -->
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
                            <td><?= $pet['id'] ?></td>
                            <td><?= htmlspecialchars($pet->getTipoPet()) ?></td>
                            <td><?= htmlspecialchars($pet->getRaca()) ?></td>
                            <td><?= htmlspecialchars($pet->getApelido()) ?></td>
                            <td><?= htmlspecialchars($pet->getIdade()) ?></td>
                            <td><?= htmlspecialchars($pet->getSexo()) ?></td>
                            <td class="text-center">
                                <a href="atualizar_pet.php?id=<?= $pet->getId() ?>" class="btn btn-sm btn-warning me-1">Editar</a>
                                <a href="../controllers/PetController.php?remover=<?= $pet->getId() ?>" class="btn btn-sm btn-danger"
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
