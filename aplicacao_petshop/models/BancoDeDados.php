<?php 
// Arquivo com a interface que representa métodos relacionados a operações em banco de dados.

interface BancoDeDados{
    public function consultarBanco($tabela);
    public function obterDados();
    public function cadastrarDados($tabela);
    public function desconectarBanco();
}
?>