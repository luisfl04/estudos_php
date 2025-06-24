<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Endereco.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Usuario.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/controllers/EnderecoController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/controllers/UsuarioController.php';

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

            // Criando instância de Usuario
            $usuario = new Usuario(
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
                $_POST['rua'],
                $_POST['bairro'],
                $_POST['cidade'],
                $_POST['estado'],
                $_POST['complemento']
            );
            $enderecoController = new EnderecoController($endereco);

            // Persistindo dados no banco
            $enderecoController->cadastrarEndereco();
            $usuarioController->cadastrarUsuario();


            $_SESSION['mensagem_cadastro'] = "Cadastro realizado com sucesso!";
        } catch (Exception $e) {
            $_SESSION['mensagem_cadastro'] = "Erro ao realizar cadastro: " . $e->getMessage();
        }

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

echo "Método  recebeido -> " . $_SERVER['REQUEST_METHOD'];

// Controlando requisição:
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo "post";
    $cadastro = new CadastroController();
    $cadastro->processarCadastro();
}
else{
    echo "Método de requisição inválido";
}

?>
