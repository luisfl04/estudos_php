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

    public function criarPet($nome_passado, $apelido_passado, $tipo_do_pet_informado, $dono_do_pet_informado){
        /* Método que incializa os atributos da classe Pet. */
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
        $comando_sql = "insert into pet(nome_do_pet, apelido, tipo_do_pet, dono_do_pet)
        values('{$this->getNomePet()}', '{$this->getApelido()}', '{$this->getTipoPet()}', '{$this->getDonoPet()}');
        ";
        $this->controlador_banco->cadastrarDados($comando_sql);

        return "Pet cadastrado com sucesso";
    }

    public function consultarPet(){
        $comando_sql = "select * from pet";
        $resposta_pets = $this->controlador_banco->consultarBanco($comando_sql);
        $collection_pets[] = [];
        // $collection_pets = $this->criarCollection($valores_banco);
       
        return $collection_pets;
    }

    public function criarCollection($valores_banco): array{
        $collection_pets = [];
        foreach($valores_banco as $valor){
            $pet_atual = new Pet();
            $pet_atual->criarPet($valor[1], $valor[2], $valor[3], $valor[4]);
            $collection_pets[] = $pet_atual;
        }
        return $collection_pets;
    }



}



?>