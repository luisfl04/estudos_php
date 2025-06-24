<?php
// Incluindo controlador do banco de dados:
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/banco_de_dados/ControladorBanco.php';

// Classe que representa a tabela 'PET'.
class Pet{
    // Atributos:
    private $id_pet;
    private $tipo_pet;
    private $raca;
    private $apelido;
    private $idade;
    private $sexo;
    private $controlador_banco;

    // Construct
    public function __construct(){
        $this->controlador_banco = new ControladorBanco();
    }

    public function criarPet($id_passado = 0, $nome_passado, $apelido_passado, $tipo_do_pet_informado, $dono_do_pet_informado){
        /* Método que incializa os atributos da classe Pet. */
        $this->id_pet = $id_passado;
        $this->nome_do_pet = $nome_passado;
        $this->apelido = $apelido_passado;
        $this->tipo_do_pet = $tipo_do_pet_informado;
        $this->dono_do_pet = $dono_do_pet_informado;
    }

    // Getters:
    public function getId(){
        return $this->id_pet;
    }

    public function getNomePet(): string{
        return $this->nome_do_pet;
    }

    public function getApelido(){
        return $this->apelido;
    }

    public function getTipoPet(){
        return $this->tipo_do_pet;
    }

    public function getDonoPet(){
        return $this->dono_do_pet;
    }


    public function cadastrarPetBanco(){
        $stmt = $this->db->prepare("INSERT INTO pet (tipo_pet, raca, apelido, idade, sexo) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $tipo_pet, $raca, $apelido, $idade, $sexo);
        return $stmt->execute();
    }

    public function consultarPetBanco(){
        $comando_sql = "select * from pet";
        $resposta_pets = $this->controlador_banco->consultarBanco($comando_sql);
        return $resposta_pets;
    }
    
    public function buscarPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM pet WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function atualizar($id, $tipo_pet, $raca, $apelido, $idade, $sexo) {
        $stmt = $this->db->prepare("UPDATE pet SET tipo_pet=?, raca=?, apelido=?, idade=?, sexo=? WHERE id=?");
        $stmt->bind_param("sssisi", $tipo_pet, $raca, $apelido, $idade, $sexo, $id);
        return $stmt->execute();
    }

    public function remover($id) {
        $stmt = $this->db->prepare("DELETE FROM pet WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }


    public function criarCollection($respostas_pet){
    }



}



?>
