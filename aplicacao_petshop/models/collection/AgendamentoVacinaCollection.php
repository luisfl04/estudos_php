<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/collection/CollectionBase.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/AgendamentoVacina.php';

class AgendamentoVacinaCollection extends CollectionBase
{
    public function criarCollection(array $valores_retorno_banco): array
    {
        $colecao = [];

        foreach ($valores_retorno_banco as $linha) {
            $agendamento_vacina = new AgendamentoVacina(
                $linha['pet_id'],
                $linha['veterinario_id'],
                $linha['vacina_id'],
                $linha['data_agendamento'],
                $linha['usuario_relacionado_id'],
            );
            $agendamento_vacina->setId($linha['id_agendamento_vacina']);
            $colecao[] = $agendamento_vacina;
        }

        return $colecao;
    }
}
