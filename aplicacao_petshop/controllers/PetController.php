<?php


// Incluindo classe modelo:
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Pet.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/views/includes/debug_erro.php';


class PetController {
    protected Pet $pet;

    // Construtor
    public function __construct(Pet $pet) {
        $this->pet = $pet;
    }

    // Cadastrar pet no banco
    public function cadastrarPetBanco(int $id_usuario): void {
        $this->pet->cadastrarPetBanco($id_usuario);
    }

    // Obter pets do usuário autenticado
    public function obterPetsUsuario(string $username): array {
        $resposta = $this->pet->listarPetsUsuario($username);
        return $this->pet->criarCollection($resposta);
    }

    // Obter todos os pets (opcional)
    public function obterTodosPets(): array {
        $resposta = $this->pet->consultarPetBanco();
        return $this->pet->criarCollection($resposta);
    }

    // Atualizar pet
    public function atualizarPetBanco(int $id_pet): void {
        $this->pet->atualizarPetBanco($id_pet);
    }

    // Remover pet
    public function removerPetBanco(int $id_pet): void {
        $this->pet->removerPetBanco($id_pet);
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['acao']) && $_POST['acao'] === 'cadastrar') {
        $pet = new Pet($_POST['tipo_pet'], $_POST['raca'], $_POST['apelido'], $_POST['idade'], $_POST['sexo']);
        $pet->cadastrarPetBanco($_POST['id_usuario']);
        header("Location: /estudos_php/aplicacao_petshop/views/crud/crud_pets.php");
        exit;
    }
    else if (isset($_POST['acao']) && $_POST['acao'] === 'atualizar') {
        $id_pet = $_POST['id_pet'];
        $tipo_pet = $_POST['tipo_pet'];
        $raca = $_POST['raca'];
        $apelido = $_POST['apelido'];
        $idade = $_POST['idade'];
        $sexo = $_POST['sexo'];

        $pet = new Pet($tipo_pet ,$raca, $apelido, $idade, $sexo);
        $pet->atualizarPetBanco($id_pet);
        header("Location: /estudos_php/aplicacao_petshop/views/crud/crud_pets.php");
        exit;
    }

}else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['remover'])) {
    $pet = new Pet("" ,"", "", 0, "");
    $pet->removerPetBanco($_GET['remover']);
    header("Location: /estudos_php/aplicacao_petshop/views/crud/crud_pets.php");
}


?>
