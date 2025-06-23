<?php

require_once 'CollectionBase.php';
require_once '../Endereco.php'; // Supondo que você tenha uma classe Usuario

class UsuarioCollection extends CollectionBase
{
    public function criarCollection(array $valores_retorno_banco): array
    {
        $colecao = [];

        foreach ($valores_retorno_banco as $linha) {
            $endereco = new Endereco(
                $linha['id_endereco'],
                $linha['rua'],
                $linha['bairro'],
                $linha['estado'],
                $linha['complemento'],
            );
            $colecao[] = $endereco;
        }

        return $colecao;
    }
}
