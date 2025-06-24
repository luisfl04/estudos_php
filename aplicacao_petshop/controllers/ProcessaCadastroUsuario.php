<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/controllers/CadastroController.php';

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