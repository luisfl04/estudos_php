<?php 

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/views/includes/debug_erro.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/controllers/UsuarioController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/controllers/VeterinarioController.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $tipo_usuario = $_POST['tipo_usuario'];
    if($tipo_usuario === 'usuario'){
        $contoller_usuario = new UsuarioController(); 
        $contoller_usuario->loginUsuario($_POST['username'], $_POST['senha']);
    }
    else if($tipo_usuario === 'veterinario'){
        $controller_veterinario = new VeterinarioController();
    }

}
else{
    echo "Método de requisição não permitido";
}

?>