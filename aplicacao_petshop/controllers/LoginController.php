<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/banco_de_dados/ControladorBanco.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/controllers/UsuarioController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/controllers/VeterinarioController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Usuario.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Veterinario.php';

class LoginController {
    private $controlador_banco;

    public function __construct() {
        $this->controlador_banco = new ControladorBanco();
    }


    public function autenticar(string $tipo_usuario, string $username, string $senha): void {
        if ($tipo_usuario === 'usuario') {
            $usuario = new Usuario ($username, $senha, "", "", "", "", "");
            $controller = new UsuarioController($usuario);
            $controller->loginUsuario($username, $senha);
        } else if ($tipo_usuario === 'veterinario') {
            $veterinario = new Veterinario($username, $senha, 0," " , " ", " ", " ", " " );
            $controller = new VeterinarioController($veterinario);
            $controller->loginVeterinario($username, $senha);
        } else {
            $_SESSION['mensagem_cadastro'] = "Tipo de usuário inválido!";
            header("Location: /estudos_php/aplicacao_petshop/index.php");
            exit;
        }
    }
}

?>