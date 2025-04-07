<?php
// Incluindo classe Pai:
include_once("conta.php");

// Criando classe filha:
class ContaCorrente extends Conta{
  // atributos:
  private $saldo_conta;

  // Construtor:
  public function __construct($nome_correntista, $numero_conta_correntista, $numero_agencia_correntista, $saldo_correntista_informado){
    parent::__construct($nome_correntista, $numero_conta_correntista, $numero_agencia_correntista);
    $this->saldo_conta = $saldo_correntista_informado;
  }

  // Métodos Get:
  public function getSaldoConta(){
    return $this->saldo_conta;
  }

  // Métodos set:
  public function setSaldoConta($novo_saldo_conta){
    $this->saldo_conta = $novo_saldo_conta;
  }

  public function getExtratoContaCorrente(){
    parent::toString();
    echo "Saldo da conta corrente -> " . $this->saldo_conta . "<br>";
  }

}

?>
