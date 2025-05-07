<?php

class Conta{

  // Atributos:
  private $nome_pessoa;
  private $numero_conta;
  private $agencia_conta;

  // Construtor da classe:
  public function __construct($nome_passado, $numero_conta_passado, $agencia_conta_passada){
    $this->nome_pessoa = $nome_passado;
    $this->numero_conta = $numero_conta_passado;
    $this->agencia_conta = $agencia_conta_passada;
  }

  // Métodos get:
  public function getNomePessoa(){
    return $this->nome_pessoa;
  }

  public function getNumeroConta(){
    return $this->numero_conta;
  }

  public function getAgenciaConta(){
    return $this->agencia_conta;
  }

  // Métodos Set:
  public function setNomePessoa($novo_nome){
    $this->nome_pessoa = $novo_nome;
  }

  public function setNumeroConta($novo_numero_conta){
    $this->numero_conta = $novo_numero_conta;
  }

  public function setAgenciaConta($nova_agencia_conta){
    $this->agencia_conta = $nova_agencia_conta;
  }

  // Função que imprime os valores dos Atributos:
  public function toString(){
    echo "INFORMAÇÕES DA CONTA:<br><br>";
    echo "Nome do correntista -> " . $this->nome_pessoa . "<br>";
    echo "Numero da conta -> " . $this->numero_conta . "<br>";
    echo "Numero da agência -> " . $this->agencia_conta . "<br>";
  }

}

?>
