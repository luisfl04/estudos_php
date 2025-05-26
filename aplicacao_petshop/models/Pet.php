<?php 
// Incluindo controlador do banco de dados:
include $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/banco_de_dados/ControladorBanco.php';



// Classe que representa a tabela 'PET'.
class Pet{
    // Atributos:
    public $id_pet;

    private $nome_do_pet;
    private $apelido;
    private $tipo_do_pet;
    private $dono_do_pet;

    private $controlador_banco;

    // Construct
    public function __construct(){
        $this->controlador_banco = new ControladorBanco();
    }

    public function criarPet( $nome_passado, $apelido_passado, $tipo_do_pet_informado, $dono_do_pet_informado){
        /* Método que incializa os atributos da classe Pet. */
        $this->nome_do_pet = $nome_passado;
        $this->apelido = $apelido_passado;
        $this->tipo_do_pet = $tipo_do_pet_informado;
        $this->dono_do_pet = $dono_do_pet_informado;
        return $this;
    }

    // Getters:
    public function getId(){
        return $this->id_pet;
    }

    public function getNomePet(){ 
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
        $comando_sql = "insert into pet(nome_do_pet, apelido, tipo_do_pet, dono_do_pet)
        values('{$this->getNomePet()}', '{$this->getApelido()}', '{$this->getTipoPet()}', '{$this->getDonoPet()}');
        ";
        $this->controlador_banco->cadastrarDados($comando_sql);

        return "Pet cadastrado com sucesso";
    }

    public function consultarPet(){
        $comando_sql = "select * from pet";
    
        $this->controlador_banco->consultarBanco($comando_sql);
        $resposta = $this->controlador_banco->obterDados();
        return $resposta;
    }


}



?>