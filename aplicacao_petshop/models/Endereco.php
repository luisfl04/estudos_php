    <?php
// Incluindo classes auxiliares:
include $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/banco_de_dados/ControladorBanco.php';
include $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/collection/EnderecoCollection.php';

class Endereco {
    private int $id_endereco;
    private string $rua;
    private string $bairro;
    private string $estado;
    private string $complemento;

    private $controlador_banco;
    private $endereco_collection;

    // Construtor
    public function __construct(
        int $id = 0,
        string $rua,
        string $bairro,
        string $estado,
        string $complemento
    ) {
        $this->id_endereco = $id;
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->estado = $estado;
        $this->complemento = $complemento;
        $this->controlador_banco = new ControladorBanco();
        $this->endereco_collection = new EnderecoCollection();
    }

    // Getters
    public function getId(): int {
        return $this->id_endereco;
    }

    public function getRua(): string {
        return $this->rua;
    }

    public function getBairro(): string {
        return $this->bairro;
    }

    public function getEstado(): string {
        return $this->estado;
    }

    public function getComplemento(): string {
        return $this->complemento;
    }

    // Setters
    public function setRua(string $nova_rua): void {
        $this->rua = $nova_rua;
    }

    public function setBairro(string $novo_bairro): void {
        $this->bairro = $novo_bairro;
    }

    public function setEstado(string $novo_estado): void {
        $this->estado = $novo_estado;
    }

    public function setComplemento(string $novo_complemento): void {
        $this->complemento = $novo_complemento;
    }

    // Métodos de banco
    public function cadastrarEnderecoBanco() {
        $comando_sql = "
            INSERT INTO endereco (rua, bairro, estado, complemento)
            VALUES (
                '{$this->getRua()}',
                '{$this->getBairro()}',
                '{$this->getEstado()}',
                '{$this->getComplemento()}'
            );
        ";

        $this->controlador_banco->cadastrarDados($comando_sql);
    }

    public function consultarEnderecoBanco() {
        $comando_sql = "SELECT * FROM view_endereco;";
        $resposta = $this->controlador_banco->consultarBanco($comando_sql);
        return $resposta;
    }

    public function criarCollection($valores_retorno_banco) : array{
        return $this->endereco_collection->criarCollection($valores_retorno_banco);
    }

}
