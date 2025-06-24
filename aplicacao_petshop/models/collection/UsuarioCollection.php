<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/collection/CollectionBase.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Usuario.php';

class UsuarioCollection extends CollectionBase
{
    public function criarCollection(array $valores_retorno_banco): array
    {
        $colecao = [];

        foreach ($valores_retorno_banco as $linha) {
            $usuario = new Usuario(
                $linha['id_usuario'],
                $linha['username'],
                $linha['senha'],
                $linha['nome'],
                $linha['telefone'],
                $linha['cpf'],
            $linha['data_nascimento'],
                $linha['sexo']
            );
            $colecao[] = $usuario;
        }

        return $colecao;
    }
}
