<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/collection/CollectionBase.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Vacina.php';

class VacinaCollection extends CollectionBase
{
    public function criarCollection(array $valores_retorno_banco): array
    {
        $colecao = [];

        foreach ($valores_retorno_banco as $linha) {
            $vacina = new Vacina(
                $linha['nome_tipo'],
                $linha['tipo_pet_id'],
                $linha['descricao_tipo'],
                $linha['valor'],
            );
            $vacina->setId($linha['id_vacina']);
            $colecao[] = $vacina;
        }

        return $colecao;
    }
}
