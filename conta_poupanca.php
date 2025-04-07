<?php
// libs:
include("conta.php");

// Implementação da conta:
class ContaPoupanca extends Conta{

    // Atributos:
    private $saldo_conta;
    private $numero_transacoes;
    private $juros_mensais;

    // Construtor:
    public function __construct($nome_passado, $numero_conta, $agencia_conta){
      parent::__construct($nome_passado, $numero_conta, $agencia_conta);
    }

    // Métodos Get:
    public function getSaldo(){
      return $this->saldo_conta;
    }

    public function getNumeroTransacoes(){
      return $this->numero_transacoes;
    }

    public function getJurosMensais(){
      return $this->juros_mensais;
    }

    // Métodos set:
    public function setSaldoConta($novo_saldo){
      $this->saldo_conta = $novo_saldo;
    }

    public function setJurosMensais($novo_valor_juros){
      $this->juros_mensais = $novo_valor_juros;
    }

    // métodos gerais:
    public function incrementarNumeroTransacoes(){
      $this->numero_transacoes++;
    }
    
}








?>
