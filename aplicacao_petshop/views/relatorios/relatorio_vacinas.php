<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/Vacina.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/controllers/VacinaController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/vendor/fpdf/fpdf.php';

$vacina = new Vacina("","","",0);
$controller = new VacinaController($vacina);
$vacinas = $controller->obterVacina();

// Criando o PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,'Relatorio de Vacinas',0,1,'C');
$pdf->Ln(5);

// Cabeçalho da tabela
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,8,'ID',1);
$pdf->Cell(40,8,'Nome',1);
$pdf->Cell(30,8,'Tipo Pet',1);
$pdf->Cell(70,8,'Descricao',1);
$pdf->Cell(30,8,'Valor (R$)',1);
$pdf->Ln();

// Dados
$pdf->SetFont('Arial','',10);
foreach ($vacinas as $v) {
    $pdf->Cell(10,8,$v->getIdVacina(),1);
    $pdf->Cell(40,8,utf8_decode($v->getNome()),1);
    $pdf->Cell(30,8,$v->getTipoPet(),1);
    $pdf->Cell(70,8,utf8_decode($v->getDescricao()),1);
    $pdf->Cell(30,8,number_format($v->getValor(), 2, ',', '.'),1);
    $pdf->Ln();
}

$pdf->Output();
exit;
?>
