<?php
    require_once("fpdf/fpdf.php");
    session_start();
    $pdf= new FPDF("L","pt","A4");
    $pdf->AddPage();
    $pdf->SetFont('arial','B',12);
    $pdf->Cell(0,5,"Usuario: ".$_SESSION['usuario'],0,1,'L');
    $pdf->Ln(20);
    $pdf->Cell(0,5,"Email: ".$_SESSION['login'],0,1,'L');
    $pdf->Ln(20);
    $pdf->Cell(0,5,"Arquivos: ",0,1,'L');
    $pdf->Ln(20);
    $dir ="../arquivos/";
    $file = scandir($dir,1);
    session_start();
    array_pop($file); 
    array_pop($file);
    $files = array();
    for ($i=0; $i < count($file) ; $i++) { 
            if (substr($file[$i], 0, strpos($file[$i], "_")) == $_SESSION['usuario']) {
                array_push($files, $file[$i]);
            }
    }
    for ($cont=0; $cont < count($files); $cont++) {
        $pdf->Cell(0,5,$files[$cont],0,1,'L');
        $pdf->Ln(20);
    }
    $pdf->Output();
?>