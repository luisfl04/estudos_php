<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Endereco.php';

class EnderecoController {
    protected $endereco;

    // Construtor
    public function __construct(Endereco $endereco) {
        $this->endereco = $endereco;
    }

    // Cadastrar endereço no banco
    public function cadastrarEndereco() : int {
        $id_cadastrado = $this->endereco->cadastrarEnderecoBanco();
        return $id_cadastrado;
    }

    // Obter endereços (retorna array de objetos Endereco)
    public function obterEndereco(): array {
        $resposta = $this->endereco->consultarEnderecoBanco();
        return $this->endereco->criarCollection($resposta);
    }

}
