<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/collection/CollectionBase.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Pet.php';

class PetCollection extends CollectionBase
{
    public function criarCollection(array $valores_retorno_banco): array
    {
        $colecao = [];

        foreach ($valores_retorno_banco as $linha) {
            $pet = new Pet(
                $linha['tipo_pet_id'],
                $linha['raca_pet'],
                $linha['apelido'],
                $linha['idade'],
                $linha['sexo'],
            );
            $pet->setId($linha['id_pet']);
            $colecao[] = $pet;
        }

        return $colecao;
    }
}
