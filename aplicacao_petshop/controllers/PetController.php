<?php

// Incluindo classe modelo:
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Pet.php';

class PetController{
    // Intância da classe de banco de dados:
    protected $model_pet;

    // Iniciando instância
    public function __construct(){
        $this->model_pet = new Pet();
    }

    // Método que controlará o fluxo
    public function controlarRequisicao($info){
        if ($info === 'obterPet'){
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
        $pets =  $this->model_pet->consultarPet();
        $collection_pets = $this->model_pet->criarCollection($pets);
        return $collection_pets;
    }


}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['acao']) && $_POST['acao'] === 'cadastrar') {
        $petModel->cadastrar($_POST['tipo_pet'], $_POST['raca'], $_POST['apelido'], $_POST['idade'], $_POST['sexo']);
        header("Location: ../views/crud_pets.php");
    }

    if (isset($_POST['acao']) && $_POST['acao'] === 'atualizar') {
        $petModel->atualizar($_POST['id'], $_POST['tipo_pet'], $_POST['raca'], $_POST['apelido'], $_POST['idade'], $_POST['sexo']);
        header("Location: ../views/crud_pets.php");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['remover'])) {
    $petModel->remover($_GET['remover']);
    header("Location: ../views/crud_pets.php");
}


?>
