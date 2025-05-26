<?php 

// Incluindo classe modelo:
include $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Pet.php';

class PetController{
    // Intância da classe de banco de dados:
    protected $model_pet;

    // Iniciando instância
    public function __construct(){
        $this->model_pet = new Pet();
    }
    
    // Método que controlará o fluxo
    public function controlarRequisicao(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->cadastrarPet();
        }
        else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $this->obterPet();
        }
        else{
            return "Método de requisição não permitido!";
        }
    }

    public function cadastrarPet(){
        // Obtendo valores da requisição:
        $nome_do_pet = $_POST['nome_do_pet'];
        $apelido = $_POST['apelido'];
        $tipo_do_pet = $_POST['tipo_do_pet'];
        $dono_do_pet = $_POST['dono_do_pet'];

        // Criando objeto pet:
        $this->model_pet->criarPet( $nome_do_pet, $apelido, $tipo_do_pet, $dono_do_pet);
    
        // Cadastrando o objeto no banco de dados:
        $resposta_cadastro = $this->model_pet->cadastrarPetBanco();
    
        echo $resposta_cadastro;
    }

    public function obterPet(){
        $pets = $this->model_pet->consultarPet();
        $collection_pet[] = [];
        foreach($pets as $pet ){
            $pet_criado = $this->model_pet->criarPet($pet['nome_do_pet'], $pet['apelido'], $pet['tipo_do_pet'], $pet['dono_do_pet']);
            $nome_pet = $pet_criado->getNomePet();
            $collection_pet["$nome_pet"] = $pet_criado;
        }
    
        return $collection_pet;
    }


}

?>