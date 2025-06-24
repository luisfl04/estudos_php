
<?php
// Incluindo classes auxiliares:
include $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/banco_de_dados/ControladorBanco.php';
include $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/collection/UsuarioCollection.php';

class Usuario {
    private $id_usuario;
    private $username;
    private $senha;

    private  $nome;
    private  $telefone;
    private  $cpf;
    private  $data_nascimento;
    private  $sexo;

    private $controlador_banco;

    private $usuario_collection;


    // Construtor
    public function __construct($id=0, $username, $senha, $nome, $telefone, $cpf, $data_nascimento, $sexo) {
        $this->id_usuario = $id;
        $this->username = $username;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->cpf = $cpf;
        $this->data_nascimento = $data_nascimento;
        $this->sexo = $sexo;
        $this->controlador_banco = new ControladorBanco();
        $this->usuario_collection = new UsuarioCollection();
    }

    // Getters
    public function getId() : int{
        return $this->id_usuario;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getSenha(): string {
        return $this->senha;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getTelefone(): string {
        return $this->telefone;
    }

    public function getCpf(): string {
        return $this->cpf;
    }

    public function getDataNascimento(): string {
        return $this->data_nascimento;
    }

    public function getSexo(): string {
        return $this->sexo;
    }

    // Setters
    public function setNome(string $novo_nome): void {
        $this->nome = $novo_nome;
    }

    public function setTelefone(string $novo_telefone): void {
        $this->telefone = $novo_telefone;
    }

    public function setUsername(string $novo_username): void {
        $this->username = $novo_username;
    }

    public function setSenha(string $nova_senha): void {
        $this->senha = $nova_senha;
    }

    public function cadastrarUsuarioBanco() : void{
        $comando_sql = "insert into usuario(username, senha, nome, telefone, cpf, data_nascimento, sexo)
        values('{$this->getUsername()}', '{$this->getSenha()}', '{$this->getNome()}', '{$this->getTelefone()}', '{$this->getCpf()}', '{$this->getDataNascimento()}', '{$this->getSexo()}');
        ";

        $this->controlador_banco->cadastrarDados($comando_sql);
    }

    public function consultarUsuarioBanco() : array{
        $comando_sql = "select * from view_usuario";
        $resposta = $this->controlador_banco->consultarBanco($comando_sql);
        return $resposta;
    }

    public function criarCollection($valores_retorno_banco) : array{
        return $this->usuario_collection->criarCollection($valores_retorno_banco);
    }

    public function consultarDadosLogin($username, $senha) : bool{
        $comando_sql = "
            SELECT * FROM usuario
            WHERE username = '$username' AND senha = '$senha'
            LIMIT 1;
        ";

        $resultado = $this->controlador_banco->consultarBanco($comando_sql);

        return !empty($resultado); // retorna true se encontrou, false caso contrário
    }


}
