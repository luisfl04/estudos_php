<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/collection/CollectionBase.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Endereco.php';

class EnderecoCollection extends CollectionBase
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
