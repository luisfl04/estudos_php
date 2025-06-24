<?php
include_once('../models/Endereco.php');

class EnderecoController {
    protected Endereco $endereco;

    // Construtor
    public function __construct(Endereco $endereco) {
        $this->endereco = $endereco;
    }

    // Cadastrar endereço no banco
    public function cadastrarEndereco() {
        $this->endereco->cadastrarEnderecoBanco();
    }

    // Obter endereços (retorna array de objetos Endereco)
    public function obterEndereco(): array {
        $resposta = $this->endereco->consultarEnderecoBanco();
        return $this->endereco->criarCollection($resposta);
    }

}
