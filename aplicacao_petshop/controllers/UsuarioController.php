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
        $valores = $this->usuario->consultarUsuarioBanco();
        return $this->usuario->criarCollection($valores);
    }

    // Realiza login simples (exemplo)
    public function loginUsuario(string $username, string $senha): void{
        $resposta =  $this->usuario->consultarDadosLogin($username, $senha);
        if($resposta === true){
            $_SESSION['nome_usuario'] = $username;
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
