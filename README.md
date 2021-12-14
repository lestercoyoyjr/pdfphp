# pdfphp
a pdf file for php

This is what it used to go before changes

<?php
    // use templte.php to call connection
    // we'll include the template
    include('template.php');
    require('conection.php');

    // query
    $query="SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado-e.id_estado";
    $resultado = $mysqli->query($query);
    
    // in this way we create the pdf file
    // this can also receive parameters which are: sheet linear (P - portane o L - landscape
    // size - mm, cm, etc., and sheet type - legal, a4, etc), 
    // $pdf = new FPDF('P', 'mm', 'legal');

    // if we want a personalized sheet size
    // we don't use anymore FPDF but instead we use PDF which is the one
    // we are using in the class
    $pdf = new PDF();
    // to use footer
    $pdf->AliasNbPages();

    // the old one
    // $pdf = new FPDF();
    $pdf->AddPage();
    // letters
    $pdf->Setfont('Arial', 'B', 12);
    // we'll add some headers
    $pdf->SetFillColor(232,232,232);
    $pdf->Cell(70, 6, 'ESTADO', 1, 0, 'C', 1);
    $pdf->Cell(20, 6, 'ID', 1, 0, 'C', 1);
    $pdf->Cell(70, 6, 'MUNICIPIO', 1, 1, 'C', 1);

    // if we want to move 10 points from left
    // it will only affect the first one
    // $pdf-> SetX(50);
    // for Y 
    //$pdf-> SetY(50);

    // if we want both X and Y
    // $pdf-> SetXY(50, 50);
    // we'll add a cell (large(px),height(px), text, border, line spacing, lineary)
    // $pdf->Cell(100,10,'Hola Mundo', 0, 1, 'C');
    // If we want the cell be dynamic
    // $y = $pdf->GetY();
    // $pdf->SetY($y+10);
    // $pdf->Cell(100,10,'Hola Mundo2', 1, 1, 'C');
    // $pdf->Cell(100,10,'Hola Mundo dsfjlkasdfljk;asdfkaslkjf;lsajkdf', 1, 1, 'C');
    // Many lines at the same cell
    $pdf->Multicell(100,8,'Hola Mundo dsfjlkasdfljk;asdfkaslkjf;lsajkdf', 1, 'C', 0);
    // Difference with background
    // $pdf->Multicell(100,8,'Hola Mundo dsfjlkasdfljk;asdfkaslkjf;lsajkdf', 0, 'C', 0);

    // add a new sheet
    $pdf->AddPage();

    // we show the pdf file
    $pdf->Output();
?>
