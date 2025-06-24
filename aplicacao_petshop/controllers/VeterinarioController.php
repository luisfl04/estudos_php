<?php
require_once '../models/banco_de_dados/ControladorBanco.php';

class VeterinarioController {
    public function autenticar($usuario, $senha) {
        $banco = new ControladorBanco();
        $conn = $banco->abrirConexao();

        $stmt = $conn->prepare("SELECT * FROM veterinario WHERE usuario = ? AND senha = ?");
        $stmt->bind_param("ss", $usuario, $senha);
        $stmt->execute();
        $resultado = $stmt->get_result();

        return $resultado->fetch_assoc();
    }
}
