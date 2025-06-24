<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $mensagem = $_SESSION['mensagem_cadastro'] ?? '';
    unset($_SESSION['mensagem_cadastro']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/views/includes/cdn.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/views/includes/debug_erro.php';
    ?>
</head>

<body>

    <div class="container border rounded mt-5 p-4 mb-5">

        <h2 class="mt-4 mb-4 text-center">Cadastro de Usuário</h2>

        <?php if (!empty($mensagem)): ?>
            <div class="alert alert-info">
            <?= htmlspecialchars($mensagem) ?>
            </div>
        <?php endif; ?>

        <form method="post" action="../../controllers/processar/processarCadastroUsuario.php" enctype="multipart/form-data">

            <!-- Dados do Usuário -->
            <h4 class="mb-3">Dados pessoais</h4>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="usuario" class="form-label">Usuário</label>
                    <input type="text" maxlength="20" class="form-control" id="usuario" name="username" required>
                </div>
                <div class="col-md-6">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" maxlength="8" class="form-control" id="senha" name="senha" required>
                </div>

            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" maxlength="50" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="col-md-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" maxlength="11" class="form-control" id="telefone" name="telefone" required>
                </div>
                <div class="col-md-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" maxlength="11" class="form-control" id="cpf" name="cpf" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                </div>

                <div class="col-md-4">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select class="form-select" id="sexo" name="sexo" required>
                        <option value="" selected disabled>Selecione</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>

            </div>

            <hr class="my-4">

            <!-- Endereço -->
            <h4 class="mb-3">Endereço</h4>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="rua" class="form-label">Rua</label>
                    <input type="text" maxlength="50" class="form-control" id="rua" name="rua" required>
                </div>
                <div class="col-md-6">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" maxlength="50" class="form-control" id="bairro" name="bairro" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" maxlength="50" class="form-control" id="cidade" name="cidade" required>
                </div>
                <div class="col-md-4">
                    <label for="estado" class="form-label">Estado</label>
                    <input type="text" maxlength="30" class="form-control" id="estado" name="estado" required>
                </div>
                <div class="col-md-2">
                    <label for="complemento" class="form-label">Complemento</label>
                    <input type="text" maxlength="60" class="form-control" id="complemento" name="complemento">
                </div>
            </div>

            <div class="text-center mt-5">
                <button type="submit" class="btn btn-lg btn-primary">Cadastrar</button>
            </div>

        </form>

    </div>


</body>

</html>
