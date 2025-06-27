<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/controllers/LoginController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $tipo_usuario = $_POST['tipo_usuario'] ?? '';

    $login = new LoginController();
    $login->autenticar($tipo_usuario, $username, $senha);
}

?>