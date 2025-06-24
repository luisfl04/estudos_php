<!-- login.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Petshop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Login do Sistema</h2>
    <form action="controllers/LoginController.php" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="username" class="form-label">Usuário</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tipo_usuario" class="form-label">Tipo de Usuário</label>
            <select name="tipo_usuario" class="form-select" required>
                <option value="cliente">Cliente</option>
                <option value="veterinario">Veterinário</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</body>
</html>
