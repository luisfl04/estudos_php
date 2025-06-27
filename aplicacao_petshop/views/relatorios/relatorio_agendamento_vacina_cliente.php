<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/AgendamentoVacina.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/controllers/AgendamentoVacinaController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/vendor/fpdf/fpdf.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id_usuario = $_SESSION['id_usuario'] ?? null;
if (!$id_usuario) {
    die("Usuário não autenticado.");
}

class RelatorioPDFAgendamentoVacinaUsuario {
    private int $id_usuario;

    public function __construct(int $id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getIdUsuario(): int
    {
        return $this->id_usuario;
    }

    public function implementarPDF(): void
    {
        $agendamento = new AgendamentoVacina(0, 0, 0, '', $this->getIdUsuario());
        $controller = new AgendamentoVacinaController($agendamento);
        $agendamentos = $controller->consultarAgendamentoVacinaUsuarioBanco();

        if (empty($agendamentos)) {
            echo "Não há agendamentos";
            exit;
        }

        // Geração do PDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, utf8_decode('Relatório de Agendamentos de Vacinas'), 0, 1, 'C');
        $pdf->Ln(5);

        // Cabeçalhos
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 8, 'Pet', 1);
        $pdf->Cell(40, 8, 'Vacina', 1);
        $pdf->Cell(50, 8, 'Veterinario', 1);
        $pdf->Cell(30, 8, 'Agendado', 1);
        $pdf->Cell(30, 8, 'Realizado', 1);
        $pdf->Ln();

        // Dados
        $pdf->SetFont('Arial', '', 10);
        foreach ($agendamentos as $registro) {
            $pdf->Cell(40, 8, utf8_decode($registro->obterNomePet()), 1);
            $pdf->Cell(40, 8, utf8_decode($registro->obterNomeVacina()), 1);
            $pdf->Cell(50, 8, utf8_decode($registro->obterNomeVeterinario()), 1);
            $pdf->Cell(30, 8, date('d/m/Y', strtotime($registro->getDataAgendamento())), 1);
            $pdf->Cell(30, 8, $registro->getDataRealizacao() ? date('d/m/Y', strtotime($registro->getDataRealizacao())) : 'Pendente', 1);
            $pdf->Ln();
        }

        $pdf->Output();
        exit;
    }
}

$relatorio_pdf = new RelatorioPDFAgendamentoVacinaUsuario($id_usuario);
$relatorio_pdf->implementarPDF();
?>
