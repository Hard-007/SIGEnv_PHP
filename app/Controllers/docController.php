<?php

use app\config\Database;

if($_SESSION['user'] == "sysadmin"){
    
require 'app/config/fpdf/fpdf.php';
$conn = (new Database())->connect();
$query = $conn->query("SELECT enc.nome ecn, enc.apelido eca, enc.contacto ecc, enc.endereco ece, ed.* FROM encarregados enc, educandos ed WHERE enc.idInscricao = ed.idInscricao");

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('public/SS192.png',4,2,30);
    // Arial bold 15
    $this->SetFont('Times','B',16);
    // Move to the right
    $this->Cell(64);
    // Title
    //$this->Cell(120,10,'StudySmart',1,0,'C');
    // Line break
    $this->Ln(25);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

if ($query->num_rows > 0) {
    $pdf = new PDF("landscape");
    $pdf->AliasNbPages();

    //$pdf = new FPDF('P', 'mm', 'A4');
    $pdf->setMargins(2,2,2,2);
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(30, 10, 'Lista de Inscritos', 0);
    $pdf->Ln();

    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(15, 7, 'ID Insc', 1, 0,'C');
    $pdf->Cell(24, 7, 'Nome Enc', 1, 0,'C');
    $pdf->Cell(18, 7, 'Apelido', 1, 0,'C');
    $pdf->Cell(16, 7, 'Contacto', 1, 0,'C');
    $pdf->Cell(2, 2, '', 1, 0,'C');
    $pdf->Cell(24, 7, 'Nome Ed', 1, 0,'C');
    $pdf->Cell(18, 7, 'Apelido', 1, 0,'C');
    $pdf->Cell(10, 7, 'Idade', 1, 0,'C');
    $pdf->Cell(16, 7, 'Contacto', 1, 0,'C');
    $pdf->Cell(44, 7, 'Endereco', 1, 0,'C');
    $pdf->Cell(60, 7, 'Escola', 1, 0,'C');
    $pdf->Cell(12, 7, 'Cla|Ano', 1, 0,'C');
    $pdf->Cell(14, 7, 'Modalidade', 1, 0,'C');
    $pdf->Cell(22, 7, 'Data Insc', 1, 0,'C');
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 6.5);
    while($row = $query->fetch_assoc()){
        $pdf->Cell(15, 6, $row['idInscricao'], 1, 0,'C');
        $pdf->Cell(24, 6, $row['ecn'], 1, 0,'C');
        $pdf->Cell(18, 6, $row['eca'], 1, 0,'C');
        $pdf->Cell(16, 6, $row['ecc'], 1, 0,'C');
        $pdf->Cell(2, 2, '', 1, 0,'C');
        $pdf->Cell(24, 6, $row['nome'], 1, 0,'C');
        $pdf->Cell(18, 6, $row['apelido'], 1, 0,'C');
        $pdf->Cell(10, 6, $row['idade'], 1, 0,'C');
        $pdf->Cell(16, 6, $row['contacto'], 1, 0,'C');
        $pdf->Cell(44, 6, $row['endereco'], 1, 0,'C');
        $pdf->Cell(60, 6, $row['escola'], 1, 0,'C');
        $pdf->Cell(12, 6, $row['classe'], 1, 0,'C');
        $pdf->Cell(14, 6, $row['modalidade'], 1, 0,'C');
        $pdf->Cell(22, 6, $row['created_at'], 1, 0,'C');
        $pdf->Ln();
    }

    $pdf->Output();
    $conn->close();
}

}else{
    echo "Acesso não autorizado. Reportando...";
}
?>