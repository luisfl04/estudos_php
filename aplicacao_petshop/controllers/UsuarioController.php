<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Usuario.php';

class UsuarioController {
    protected $usuario;

    // Construtor
    public function __construct(Usuario $usuario) {
        $this->usuario = $usuario;
    }

    // Cadastrar usuário no banco
    public function cadastrarUsuario($endereco_id_relacionado) {
        $this->usuario->cadastrarUsuarioBanco($endereco_id_relacionado);
    }

    // Obter usuários (retorna array de objetos Usuario)
    public function obterUsuario(): array {
        $valor = $this->usuario->consultarUsuarioBanco($this->usuario->getUsername());
        return $valor;
    }

    // Realiza login simples (exemplo)
    public function loginUsuario(string $username, string $senha): void{
        $resposta =  $this->usuario->consultarDadosLogin($username, $senha);
        if($resposta){
            $_SESSION['id_usuario'] = $resposta['id_usuario']; 
            $_SESSION['username'] = $resposta['username'];
            $_SESSION['nome'] = $resposta['nome'];
            header("Location: " . "/estudos_php/aplicacao_petshop/views/dashboards/dashboard_usuario.php");
            exit;
        }
        else{   
            $_SESSION['mensagem_cadastro'] = "Login ou senha inválidos! tente novamente.";
            header("Location: " . "/estudos_php/aplicacao_petshop/index.php");
            exit;
        }
    }
}
