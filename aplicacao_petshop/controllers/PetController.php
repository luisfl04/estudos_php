<?php 

// Incluindo classe modelo:
include('../models/Pet.php');

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
            echo "Método post";
        }
        else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            echo "Método get";
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
        $this->model_pet->criarPet($nome_do_pet, $apelido, $tipo_do_pet, $dono_do_pet);
    
        // Cadastrando o objeto no banco de dados:
        $this->model_pet->cadastrarPetBanco();
    }

}

// Instânciando classe na chamada do arquivo:
$instância_chamada = new PetController();
$instância_chamada->controlarRequisicao();
?>