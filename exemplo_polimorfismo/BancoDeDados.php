<?php 
// Arquivo com a interface que representa métodos relacionados a operações em banco de dados.

interface BancoDeDados{

    // Método de consulta:
    public function consultarBanco($tabela);

    // Método para persistência de dados:
    public function obterDados();

    public function cadastrarDados($tabela);

}
?>