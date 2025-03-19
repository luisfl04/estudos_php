<!-- Implementações de sintaxes básicas do PHP. -->

<!--  Classes abstratas: -->
<?php 
    
    abstract class Veiculo{
        abstract public function modeloVeiculo();
    }

    class Carro extends Veiculo{
        public function modeloVeiculo(){
            print("Eu sou um carro");
        }
    }

    class Bicicleta extends Veiculo{
        public function modeloVeiculo(){
            print("Sou uma bicicleta");
        }
    }

?>

<!-- Arrays -->
<?php 

    // Array indexado:
    $recipientes = array("xícara", "Bacia", "Prato de vidro", 1);

    // Array associativo:
    $dados_produto = array(
        "nome" => "Copo",
        "preco" => 3.78,
        "quantidade" => 8
    );

    // Multidimensional:
    $cadernos = array(
        array("Capa mole", 45.7),
        array("Modelo Tilibra", 67.5),
        array("Diário", 76.5)
    );
 
?>

<!-- Uso de callable -->  
<?php 
    // Usando com funções anônimas:
    function printar(callable $funcaoPassada){
        return $funcaoPassada();
    }

    // Chamando função passando função anônima por parâmetro:
    echo printar(function(){
        return "Função Anônima execultada!\n";
    });

    // Usando callable com métodos de classe:
    class Quadro{
        public static function getTamanhoQuadro(){
            return "Meu tamanho é 50% menor que um quadro padrão no mercado do Norte.";
        }
    }

    $chamada_funcao_quadro = ['Quadro', 'getTamanhoQuadro']; // passa os valores de chamada da funcao;
    echo printar($chamada_funcao_quadro);
?>