<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


include_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Veterinario.php';

class VeterinarioController {
    protected $veterinario;

    // Construtor
    public function __construct(Veterinario $veterinario = null) {
        $this->veterinario = $veterinario;
    }

    // Obter veterinários (retorna array de objetos Veterinario)
    public function obterVeterinarios(): array {
        $valores = $this->veterinario->consultarVeterinarioBanco();
        return $this->veterinario->criarCollection($valores);
    }

    // Realiza login simples
    public function loginVeterinario(string $username, string $senha): void {
        $resposta = $this->veterinario->consultarDadosLogin($username, $senha);
        if ($resposta) {
            $_SESSION['nome'] = $resposta['nome'];
            $_SESSION['id_veterinario'] = $resposta['id_veterinario'];
            $_SESSION['username_veterinario'] = $resposta['username'];
            header("Location: " . "/estudos_php/aplicacao_petshop/views/dashboards/dashboard_veterinario.php");
            exit;
        } else {
            $_SESSION['mensagem_cadastro'] = "Login ou senha inválidos! tente novamente";
            header("Location: " . "/estudos_php/aplicacao_petshop/index.php");
            exit;
        }
    }
}

?>
