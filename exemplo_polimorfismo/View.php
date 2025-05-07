<?php 
// Arquivo com a interface para a conexão com o banco de dados.

// Incluindo controlador do banco:  
include('ControladorBanco.php');    

$banco_exemplo = new Controladorbanco("127.0.0.1", "root", "", "banco_exemplo_conexao_php");
$banco_exemplo->consultarBanco("UsuarioConta");
$banco_exemplo->obterDados();

?>