
<?php
// Incluindo classes auxiliares:
include('./banco_de_dados/ControladorBanco.php');
include('./collection/UsuarioCollection.php');

class Usuario {
    private int $id_usuario;
    private string $nome;
    private string $telefone;
    private string $cpf;
    private string $data_nascimento;
    private string $sexo;

    private $controlador_banco;

    private $collection_base;


    // Construtor
    public function __construct(int $id=0, string $nome, string $telefone, string $cpf, string $data_nascimento, string $sexo) {
        $this->id_usuario = $id;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->cpf = $cpf;
        $this->data_nascimento = $data_nascimento;
        $this->sexo = $sexo;
    }

    // Getters
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
}
