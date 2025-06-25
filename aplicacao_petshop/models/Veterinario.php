<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/banco_de_dados/ControladorBanco.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/collection/VeterinarioCollection.php';

class Veterinario {
    private int $id_veterinario;
    private string $username;
    private string $senha;
    private string $numero_crmv;
    private string $nome;
    private string $telefone;
    private string $cpf;
    private string $data_nascimento;
    private string $sexo;

    private ControladorBanco $controlador_banco;
    private VeterinarioCollection $veterinario_collection;

    public function __construct(
        string $username,
        string $senha,
        string $numero_crmv,
        string $nome,
        string $telefone,
        string $cpf,
        string $data_nascimento,
        string $sexo
    ) {
        $this->username = $username;
        $this->senha = $senha;
        $this->numero_crmv = $numero_crmv;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->cpf = $cpf;
        $this->data_nascimento = $data_nascimento;
        $this->sexo = $sexo;

        $this->controlador_banco = new ControladorBanco();
        $this->veterinario_collection = new VeterinarioCollection();
    }

    // Getters
    public function getNumeroCrmv(): string {
        return $this->numero_crmv;
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

    public function getUsername(): string {
        return $this->username;
    }

    public function getSenha(): string {
        return $this->senha;
    }

    // Setters
    public function setNome(string $novo_nome): void {
        $this->nome = $novo_nome;
    }

    public function setTelefone(string $novo_telefone): void {
        $this->telefone = $novo_telefone;
    }

    public function setSexo(string $novo_sexo): void {
        $this->sexo = $novo_sexo;
    }

    // Consultar do banco
    public function consultarVeterinarioBanco(): array {
        $comando_sql = "SELECT * FROM veterinario";
        $resposta = $this->controlador_banco->consultarValoresBanco($comando_sql);
        return $resposta;
    }

    public function criarCollection($valores_retorno_banco) : array{
        return $this->veterinario_collection->criarCollection($valores_retorno_banco);
    }

    public function consultarDadosLogin($username, $senha) : array | null{
        $comando_sql = "
            SELECT * FROM veterinario
            WHERE username = '$username' AND senha = '$senha'
            LIMIT 1;
        ";

        $resultado = $this->controlador_banco->consultarValoresBanco($comando_sql);
        return $resultado; // retorna true se encontrou, false caso contrário
    }

    public function buscarPorId($id_veterinario): ? array {
        $comando_sql = "SELECT * FROM veterinario WHERE id_veterinario = $id_veterinario LIMIT 1;";
        $resultado = $this->controlador_banco->consultarValoresBanco($comando_sql);

        if (!empty($resultado)) {
            return $resultado[0];
        }

        return null;
    }


}
