<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Vacina.php';

class VacinaController {
    protected Vacina $vacina;

    // Construtor
    public function __construct(Vacina $vacina) {
        $this->vacina = $vacina;
    }

    // Cadastrar vacina no banco
    public function cadastrarVacina(): void {
        $this->vacina->cadastrarVacinaBanco();
    }

    // Obter vacinas (retorna array de objetos Vacina)
    public function obterVacina(): array {
        $valores = $this->vacina->consultarVacinaBanco();
        return $this->vacina->criarCollection($valores); // Assumindo que há um método criarCollection na classe Vacina
    }
}
