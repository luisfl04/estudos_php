<?php

require_once 'CollectionBase.php';
require_once '../Usuario.php'; // Supondo que você tenha uma classe Usuario

class UsuarioCollection extends CollectionBase
{
    public function criarCollection(array $valores_retorno_banco): array
    {
        $colecao = [];

        foreach ($valores_retorno_banco as $linha) {
            $usuario = new Usuario(
                $linha['id'],
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
