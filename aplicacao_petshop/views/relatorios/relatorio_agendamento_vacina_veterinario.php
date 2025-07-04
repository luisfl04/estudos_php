<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/models/AgendamentoVacina.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/controllers/AgendamentoVacinaController.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/estudos_php/aplicacao_petshop/vendor/fpdf/fpdf.php';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $id_veterinario = $_SESSION['id_veterinario'] ?? null;
    if (!$id_veterinario) {
        die("Usuário veterinário não autenticado.");
    }

    class RelatorioPDFAgendamentoVacinaVeterinario{
        private int $id_veterinario; 

        public function __construct($id_veterinario)
        {
            $this->id_veterinario = $id_veterinario;
        }

        public function getIdVeterinario() : int {
            return $this->id_veterinario;
        }

        public function implementarPDF(){
            $agendamento = new AgendamentoVacina(0, 0, 0, '', 0);
            $controller = new AgendamentoVacinaController($agendamento);
            $agendamentos = $controller->consultarAgendamentoVacinaBancoVeterinario($this->getIdVeterinario());
        
            if(empty($agendamentos)){
                echo "Não há agendamentos";
                exit;
            }
        
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
            $pdf->Cell(50,8,'Data de Agendamento',1);
            $pdf->Cell(30,8,'Status',1);
            $pdf->Ln();
        
            // Dados
            $pdf->SetFont('Arial','',10);
            foreach ($agendamentos as $registro) {
                $pdf->Cell(40,8,utf8_decode($registro->obterNomePet()),1);
                $pdf->Cell(40,8,utf8_decode($registro->obterNomeVacina()),1);
                $pdf->Cell(50,8 , date('d/m/Y', strtotime($registro->getDataAgendamento())), 1);
                $pdf->Cell(30,8, $registro->getStatusAgendamento(), 1);
                $pdf->Ln();
            }
        
            $pdf->Output();
            exit;
        }
    }

    $relatorio_pdf = new RelatorioPDFAgendamentoVacinaVeterinario($id_veterinario);
    $relatorio_pdf->implementarPDF();
?>

