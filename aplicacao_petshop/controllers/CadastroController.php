<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../models/Usuario.php');
include('../models/Endereco.php');
include('UsuarioController.php');
include('EnderecoController.php');

class CadastroController {

    public function processarCadastro(): string {
        try {
            // Verificando se todos os campos esperados foram enviados
            $campos_esperados = [
                'username', 'senha', 'nome', 'telefone', 'cpf', 'data_nascimento', 'sexo',
                'rua', 'bairro', 'estado', 'complemento'
            ];

            foreach ($campos_esperados as $campo) {
                if (empty($_POST[$campo])) {
                    throw new Exception("Campo obrigatório ausente: $campo");
                }
            }

            var_dump($_POST); // ou echo json_encode($_POST);

            // Criando instância de Usuario
            $usuario = new Usuario(
                0,
                $_POST['username'],
                $_POST['senha'],
                $_POST['nome'],
                $_POST['telefone'],
                $_POST['cpf'],
                $_POST['data_nascimento'],
                $_POST['sexo']
            );
            $usuarioController = new UsuarioController($usuario);

            // Criando instância de Endereco
            $endereco = new Endereco(
                0,
                $_POST['rua'],
                $_POST['bairro'],
                $_POST['estado'],
                $_POST['complemento']
            );
            $enderecoController = new EnderecoController($endereco);

            echo "Endereco criado";

            // Persistindo dados no banco
            $usuarioController->cadastrarUsuario();
            $enderecoController->cadastrarEndereco();
            

            $_SESSION['mensagem_cadastro'] = "Cadastro realizado com sucesso!";
        } catch (Exception $e) {
            $_SESSION['mensagem_cadastro'] = "Erro ao realizar cadastro: " . $e->getMessage();
        }
    
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cadastro = new CadastroController();
    $cadastro->processarCadastro();
}
else{
    echo "Método de requisição inválido";
}

?>
