<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/controllers/CadastroController.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cadastro = new CadastroController();
    $cadastro->processarCadastro();
}
else{
    echo "Metodo de requisição não permitido para esta rota.";  
}   
?>