<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/collection/CollectionBase.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Veterinario.php';

class VeterinarioCollection extends CollectionBase
{
    public function criarCollection(array $valores_retorno_banco): array
    {
        $colecao = [];

        foreach ($valores_retorno_banco as $linha) {
            $veterinario = new Veterinario(
                $linha['username'],
                $linha['senha'],
                $linha['numero_crmv'],
                $linha['nome'],
                $linha['telefone'],
                $linha['cpf'],
                $linha['data_nascimento'],
            $linha['sexo'],
            );
            $colecao[] = $veterinario;
        }

        return $colecao;
    }
}