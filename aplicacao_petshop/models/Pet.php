<?php
// Incluindo controlador do banco de dados:
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/banco_de_dados/ControladorBanco.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/collection/PetCollection.php';

// Classe que representa a tabela 'PET'.

class Pet {
    // Atributos:
    private int $id_pet;
    private string $tipo_pet;
    private string $raca;
    private string $apelido;
    private int $idade;
    private string $sexo;

    private $controlador_banco;
    private $pet_collection;

    // Construtor
    public function __construct(string $tipo_pet = " ", string $raca = " ", string $apelido = " ", int $idade=0, string $sexo = " ") {
        $this->id_pet = 0;
        $this->tipo_pet = $tipo_pet;
        $this->raca = $raca;
        $this->apelido = $apelido;
        $this->idade = $idade;
        $this->sexo = $sexo;
        $this->controlador_banco = new ControladorBanco();
        $this->pet_collection = new PetCollection();
    }

    // Getters
    public function getId(): int {
        return $this->id_pet;
    }

    public function getTipoPet(): string {
        return $this->tipo_pet;
    }

    public function getNomeTipoPet($id_pet): string {
        if($id_pet === "1"){
            return "cachorro";
        }
        else if($id_pet === "2"){
            return "gato";
        }
        else if($id_pet === "3"){
            return "cavalo";
        }
        else if($id_pet === "4"){
            return "pássaro";
        }
        else if($id_pet === "5"){
            return "gado";
        }

        return "Indefinido";
    }
    
    public function getRaca(): string {
        return $this->raca;
    }

    public function getApelido(): string {
        return $this->apelido;
    }

    public function getIdade(): int {
        return $this->idade;
    }

    public function getSexo(): string {
        return $this->sexo;
    }

    // Setters
    public function setId($novo_id): void{
        $this->id_pet = $novo_id;
    }

    public function setApelido(string $apelido): void {
        $this->apelido = $apelido;
    }

    public function setRaca(string $raca): void {
        $this->raca = $raca;
    }

    public function setIdade(int $idade): void {
        $this->idade = $idade;
    }

    public function setSexo(string $sexo): void {
        $this->sexo = $sexo;
    }

    // Inserção no banco
    public function cadastrarPetBanco(int $id_usuario): void {
        $comando_sql = "
            INSERT INTO pet (usuario_dono_id, tipo_pet_id, raca_pet, apelido, idade, sexo)
            VALUES ('$id_usuario', '{$this->getTipoPet()}', '{$this->getRaca()}', '{$this->getApelido()}', '{$this->getIdade()}', '{$this->getSexo()}');
        ";
        $this->controlador_banco->cadastrarDados($comando_sql);
    }

    // Consulta geral
    public function consultarPetBanco(): array {
        $comando_sql = "SELECT * FROM pet"; // ou 'pet' se não houver view
        return $this->controlador_banco->consultarValoresBanco($comando_sql);
    }
    public function listarPetsUsuario($username): array {
        $comando_sql = "
            SELECT pet.*
            FROM pet
            INNER JOIN usuario ON pet.usuario_dono_id = usuario.id_usuario
            WHERE usuario.username = '$username';
        ";

        $resultado = $this->controlador_banco->consultarValoresBanco($comando_sql);
        $colecao_pets = $this->pet_collection->criarCollection($resultado);
        return $colecao_pets;
    }


    // Criação de coleção
    public function criarCollection($valores_retorno_banco): array {
        return $this->pet_collection->criarCollection($valores_retorno_banco);
    }

    // Atualização
    public function atualizarPetBanco(int $id_pet): void {
        $comando_sql = "
            UPDATE pet
            SET tipo_pet_id = '{$this->getTipoPet()}', raca_pet = '{$this->getRaca()}', apelido = '{$this->getApelido()}',
                idade = '{$this->getIdade()}', sexo = '{$this->getSexo()}'
            WHERE id_pet = '$id_pet';
        ";
        $this->controlador_banco->autenticarValorBanco($comando_sql);
    }

    // Remoção
    public function removerPetBanco(int $id_pet): void {
        $comando_sql = "DELETE FROM pet WHERE id_pet = '$id_pet'";
        $this->controlador_banco->autenticarValorBanco($comando_sql);
    }

    // Busca específica (opcional)
    public function consultarPetPorUsuario(int $id_usuario): array {
        $comando_sql = "SELECT * FROM pet WHERE usuario_id = '$id_usuario'";
        return $this->controlador_banco->consultarValoresBanco($comando_sql);
    }

    public function buscarPorId($id_pet): ? array {
        $comando_sql = "SELECT * FROM pet WHERE id_pet = $id_pet LIMIT 1;";
        $resultado = $this->controlador_banco->consultarValoresBanco($comando_sql);

        if (!empty($resultado)) {
            return $resultado[0];
        }

        return null;
    }

}

?>
