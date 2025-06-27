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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Login - Gerenciamento Vacinas</title>
    <link rel="stylesheet" href="public/css/index.css">
    <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/views/includes/cdn.php';
    ?>
</head>

<body>

    <h1 class="text-center mt-5">Sistema de Vacinas</h1>

    <div class="container">

        <div class="login-container">
            
            <h4 class="form-title">Login no Sistema</h4>

            <?php if (!empty($mensagem)): ?>
                <div class="alert alert-info">
                    <?= htmlspecialchars($mensagem) ?>
                </div>
            <?php endif; ?>


            <form action="controllers/processar/processarLogin.php" method="post" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <label for="username" class="form-label">Usuário</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Digite seu usuário" required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control" maxlength="8" placeholder="Digite sua senha" required>
                </div>

                <div class="mb-4">
                    <label for="tipo_usuario" class="form-label">Tipo de Usuário</label>
                    <select name="tipo_usuario" id="tipo_usuario" class="form-select" required>
                        <option value="" disabled selected>Selecione</option>
                        <option value="usuario">Cliente</option>
                        <option value="veterinario">Veterinário</option>
                    </select>
                </div>
                <div class="d-flex flex-column justify-content-center"> 
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    <a class="text-center mt-4 " href="views/cadastro/cadastro_usuario.php">Não possui conta? cadastre-se</a>
                </div>

            </form>
        
        </div>
    
    </div>

</body>

</html>
