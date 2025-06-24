<?php
require_once 'banco_de_dados/ControladorBanco.php';
require_once 'colecoes/VacinaCollection.php';

class Vacina {
    private int $id_vacina;
    private string $nome;
    private string $tipo_pet;
    private string $descricao;
    private float $valor;

    private ControladorBanco $controlador_banco;
    private VacinaCollection $vacina_collection;

    public function __construct(string $nome, string $tipo_pet, string $descricao, float $valor) {
        $this->nome = $nome;
        $this->tipo_pet = $tipo_pet;
        $this->descricao = $descricao;
        $this->valor = $valor;

        $this->controlador_banco = new ControladorBanco();
        $this->vacina_collection = new VacinaCollection();
    }

    // Getters
    public function getId(): int{
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getTipoPet(): string {
        return $this->tipo_pet;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function getValor(): float {
        return $this->valor;
    }

    // Setters
    public function setDescricao(string $nova_descricao): void {
        $this->descricao = $nova_descricao;
    }

    public function setValor(float $novo_valor): void {
        $this->valor = $novo_valor;
    }

    // Métodos de banco
    public function cadastrarVacinaBanco(): void {
        $sql = "
            INSERT INTO vacina (nome, tipo_pet, descricao, valor)
            VALUES ('{$this->getNome()}', '{$this->getTipoPet()}', '{$this->getDescricao()}', {$this->getValor()});
        ";
        $this->controlador_banco->cadastrarDados($sql);
    }

    public function consultarVacinaBanco(): array {
        $sql = "SELECT * FROM view_vacina"; // ou 'vacina' se não houver view
        return $this->controlador_banco->consultarBanco($sql);
    }
}
