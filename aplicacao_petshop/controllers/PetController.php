<?php 

// Incluindo banco:
include('ControladorBanco.php');

// Criando conexão com o banco:
$conexao_banco = new ControladorBanco("localhost:3306", "root", 34512897, "PETSHOP");

// Inserindo valores a partir do formulário:
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nome_tabela = "PET";
    

    $conexao_banco->cadastrarDados();

}
else{
    echo "<p> Requisição inválida.</p>";
}



?>