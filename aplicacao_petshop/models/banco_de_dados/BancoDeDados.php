<?php
// Arquivo com a interface que representa métodos relacionados a operações em banco de dados.
interface BancoDeDados{
    public function consultarValoresBanco($sql);
    public function autenticarUsuarioBanco($sql);
    public function obterDados();
    public function cadastrarDados($sql);
    public function desconectarBanco();
}
?>
