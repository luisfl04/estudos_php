<?php
include_once('../models/Usuario.php');

class UsuarioController {
    protected Usuario $usuario;

    // Construtor
    public function __construct(Usuario $usuario) {
        $this->usuario = $usuario;
    }

    // Cadastrar usuário no banco
    public function cadastrarUsuario() {
        $this->usuario->cadastrarUsuarioBanco();
    }

    // Obter usuários (retorna array de objetos Usuario)
    public function obterUsuario(): array {
        $valores = $this->usuario->consultarUsuarioBanco();
        return $this->usuario->criarCollection($valores);
    }

    // Realiza login simples (exemplo)
    public function loginUsuario(string $username, string $senha): bool {
        $resposta =  $this->usuario->consultarDadosLogin($username, $senha);  
        return $resposta;
    }
}
