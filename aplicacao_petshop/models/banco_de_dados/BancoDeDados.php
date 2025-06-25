<?php
// Arquivo com a interface que representa métodos relacionados a operações em banco de dados.
interface BancoDeDados{
    public function consultarValoresBanco($sql);
    public function autenticarValorBanco($sql);
    public function obterDados($array);
    public function cadastrarDados($sql);
    public function desconectarBanco();
}
?>
