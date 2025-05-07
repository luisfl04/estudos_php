<?php 
// Classe que implementa os métodos da interface 'PersistirBanco'.

include('BancoDeDados.php');

class ControladorBanco implements BancoDeDados{

    protected $conexao_banco;
    protected $consulta_sql;

    // Construct:
    function __construct($servidor, $usuario, $senha, $nome){
        // Criando conexão com o banco:
        $this->conexao_banco = new mysqli(
            $servidor,
            $usuario,
            $senha,
            $nome
        );
    }

    // Métodos da interface:
    public function consultarBanco($nome_tabela){
        /* Método que atualiza o valor do atributo 'consulta_sql' para ser uma consulta
        à uma tabela de acordo com o valor do parâmetro, que é o nome da tabela pesquisada.
        */
        $this->consulta_sql = "SELECT * FROM " . $nome_tabela;
    }

    public function obterDados(){

        // Fazendo consulta no banco:
        $consulta_banco = $this->conexao_banco->query($this->consulta_sql);

        // Exibindo resultados da consulta:
        while($tupla_consulta = $consulta_banco->fetch_array(MYSQLI_ASSOC)){
            echo "Resultado obtido:" . "Nome -> " . $tupla_consulta['nome'];
            echo " ---- Idade -> " . $tupla_consulta['idade'];
            echo " ---- CPF -> " . $tupla_consulta['cpf'] . "<br><br>";
        }
    }

    public function cadastrarDados($tabela){
        // 



    }



}   




?>