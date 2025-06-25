<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/AgendamentoVacina.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/controllers/AgendamentoVacinaController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/vendor/fpdf/fpdf.php';

session_start();
$id_usuario = $_SESSION['id_usuario'] ?? null;

if (!$id_usuario) {
    die("Usuário não autenticado.");
}

// Recupera os dados de agendamentos
$agendamento = new AgendamentoVacina(0, 0, 0, '', $id_usuario);
$controller = new AgendamentoVacinaController($agendamento);
$agendamentos = $controller->consultarAgendamentoVacinaUsuarioBanco();

// Geração do PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,utf8_decode('Relatório de Agendamentos de Vacinas'),0,1,'C');
$pdf->Ln(5);

// Cabeçalhos
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,8,'Pet',1);
$pdf->Cell(40,8,'Vacina',1);
$pdf->Cell(50,8,'Veterinario',1);
$pdf->Cell(30,8,'Agendado',1);
$pdf->Cell(30,8,'Realizado',1);
$pdf->Ln();

// Dados
$pdf->SetFont('Arial','',10);
foreach ($agendamentos as $registro) {
    $pdf->Cell(40,8,utf8_decode($registro->obterNomePet()),1);
    $pdf->Cell(40,8,utf8_decode($registro->obterNomeVacina()),1);
    $pdf->Cell(50,8,utf8_decode($registro->obterNomeVeterinario()),1);
    $pdf->Cell(30,8 , date('d/m/Y', strtotime($registro->getDataAgendamento())), 1);
    $pdf->Cell(30,8,$registro->getDataRealizacao() ?  date('d/m/Y', strtotime($agendamento->getDataRealizacao())) : 'pendente', 1);
    $pdf->Ln();
}

$pdf->Output();
exit;
