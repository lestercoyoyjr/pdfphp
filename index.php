<?php
    // use templte.php to call connection
    // we'll include the template
    include 'template.php';
    require 'conection.php';

    // query
    $query="SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
    $resultado = $mysqli->query($query);

    $pdf = new PDF();
    // to use footer
    $pdf->AliasNbPages();
    $pdf->AddPage();
    
    $pdf->SetFillColor(232,232,232);
    $pdf->Setfont('Arial', 'B', 12);
    $pdf->Cell(70, 6, 'ESTADO', 1, 0, 'C', 1);
    $pdf->Cell(20, 6, 'ID', 1, 0, 'C', 1);
    $pdf->Cell(70, 6, 'MUNICIPIO', 1, 1, 'C', 1);

    $pdf->Setfont('Arial', '', 10);
    while($row = $resultado->fetch_assoc()){
        $pdf->Cell(70, 6, utf8_decode($row['estado']), 1, 0, 'C');
        $pdf->Cell(20, 6, $row['id_municipio'], 1, 0, 'C');
        $pdf->Cell(70, 6, utf8_decode($row['municipio']), 1, 1, 'C');
    }

    // Download
    $pdf->Output('D'); 
    // on disk
    // $pdf->Output('F', 'Report.pdf');
?>