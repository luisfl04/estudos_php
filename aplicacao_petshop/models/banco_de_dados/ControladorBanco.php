<?php 
// Classe que implementa os métodos da interface 'PersistirBanco'.

include('BancoDeDados.php');

class ControladorBanco implements BancoDeDados{

    protected $conexao_banco;
    protected $consulta_banco;

    // Construct:
    function __construct(){
        // Criando conexão com o banco:
        $this->conexao_banco = new mysqli(
            "127.0.0.1",
            "root",
            "",
            "petshop"
        );

        // Verificando se a conexão foi válida:
        if (mysqli_connect_errno()){
            $this->conexao_banco->close(); 
            echo "Erro ao criar controlador do banco de dados";
        }

    }

    // Métodos da interface:
    public function consultarBanco($consulta_sql){
        /* Método que atualiza o valor do atributo 'consulta_sql' para ser uma consulta
        à uma tabela de acordo com o valor do parâmetro, que é o nome da tabela pesquisada.
        */

        // Fazendo consulta no banco:
        $this->consulta_banco = $this->conexao_banco->query($consulta_sql);
        $resposta = $this->obterDados();
        return $resposta;
    }
    
    public function obterDados():array{
        while($valor = $this->consulta_banco->fetch_array(MYSQLI_ASSOC)){
            $valores[] = $valor;
        }
        return $valores;
    }

    public function cadastrarDados($comando_sql){
        $this->consulta_banco = $this->conexao_banco->query($comando_sql);
    }


    public function desconectarBanco(){
        $this->conexao_banco->close();
        echo "Instância do banco destruida.";
    }


}   

?>