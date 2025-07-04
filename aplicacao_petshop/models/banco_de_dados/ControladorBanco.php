<?php
// Classe que implementa os métodos da interface 'PersistirBanco'.

include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/banco_de_dados/BancoDeDados.php';

class ControladorBanco implements BancoDeDados{

    protected $conexao_banco;
    protected $consulta_banco;

    // Construct:
    public function __construct(){
        // Criando conexão com o banco:
        $this->conexao_banco = new mysqli(
            "127.0.0.1",
            "root",
            "",
            "sistema_vacina"
        );

        // Verificando se a conexão foi válida:
        if (mysqli_connect_errno()){
            $this->conexao_banco->close();
            echo "Erro ao criar controlador do banco de dados";
        }

    }

    // Métodos da interface:
    public function consultarValoresBanco($consulta_sql) : array{
        /* Método que atualiza o valor do atributo 'consulta_sql' para ser uma consulta
        à uma tabela de acordo com o valor do parâmetro, que é o nome da tabela pesquisada.
        */

        // Fazendo consulta no banco:
        $this->consulta_banco = $this->conexao_banco->query($consulta_sql);
        $resposta = $this->obterDados($this->consulta_banco);
        if($resposta === null){
            $array_nulo = [];
            return $array_nulo;
        }
        return $resposta;
    }

    public function autenticarValorBanco($sql): bool {

        // Executa a consulta SQL
        $resultado = $this->conexao_banco->query($sql);

        // Verifica se encontrou alguma linha
        if ($resultado && $resultado->num_rows > 0) {
            return true;
        } else {
            return false;
        }
        
    }

    public function obterDados($valores_banco): array | null{     
        while($valor = $valores_banco->fetch_array(MYSQLI_ASSOC)){
            $valores[] = $valor;
        }
        return $valores ?? null;
    }

    public function cadastrarDados($comando_sql){
        $this->consulta_banco = $this->conexao_banco->prepare($comando_sql);
        $this->consulta_banco->execute();
        return $this->conexao_banco->insert_id;
    }

    public function desconectarBanco(){
        $this->conexao_banco->close();
    }

}

?>
