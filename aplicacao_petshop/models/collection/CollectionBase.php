<?php 
abstract class CollectionBase
{
    /**
     *
     * @param array $valores_retorno_banco Array de dados do banco (formato: array de arrays associativos).
     * @return array Coleção de objetos instanciados com base nos dados.
     */
    abstract public function criarCollection(array $valores_retorno_banco): array;
}

?>