<?php
session_start();

require_once '../controllers/UsuarioController.php';
require_once '../controllers/VeterinarioController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['username'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo_usuario'];

    if ($tipo === 'cliente') {
        $controller = new UsuarioController();
        $usuarioAutenticado = $controller->autenticar($usuario, $senha);
        if ($usuarioAutenticado) {
            $_SESSION['usuario'] = $usuarioAutenticado;
            $_SESSION['tipo'] = 'cliente';
            header('Location: ../views/dashboard_cliente.php');
            exit;
        }
    } elseif ($tipo === 'veterinario') {
        $controller = new VeterinarioController();
        $veterinarioAutenticado = $controller->autenticar($usuario, $senha);
        if ($veterinarioAutenticado) {
            $_SESSION['usuario'] = $veterinarioAutenticado;
            $_SESSION['tipo'] = 'veterinario';
            header('Location: ../views/dashboard_veterinario.php');
            exit;
        }
    }

    // Se falhar
    echo "<script>alert('Usuário ou senha inválidos!'); window.location.href='../login.php';</script>";
    exit;
}
