<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$nome_usuario = $_SESSION['nome_usuario'] ?? 'Usuário';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="../../public/css/header.css" rel="stylesheet">
    <title>Sistema Vacinas</title>
    <?php   
        include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/views/includes/cdn.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/views/includes/debug_erro.php';
    ?>
</head>
<body>
<header class="header-custom py-2 bg-primary text-white">
  <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div class="d-flex align-items-center mb-2 mb-md-0">
                <img src="../../public/img/logo_vacina.png" alt="Logo Vacina" style="height:40px; width:auto;"/>
                <span class="ms-2 fs-5 fw-semibold">Sistema de Vacinação Petshop</span>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div>Bem-vindo, <?= htmlspecialchars($nome_usuario) ?>!</div>
                <a href="../../controllers/logout/logout.php" class="btn btn-outline-light btn-sm">Sair</a>
            </div>
            
        </div>
    </div>

</header>


<div class="conteudo mt-5">
