<?php
    require 'fpdf/fpdf.php';

    
    // Everything we could do with FPDF we can make it with this class
    class PDF extends FPDF
    {
        function Header()
        {
            // logotipe
            // We're gonna use "this" cause all of those functions we're calling it from the other class
            //('name_image', x_pos, y_pos, size)
            $this->Image('Images/gmail-logo-.png', 10, 10, 25);
            $this->SetFont('Arial', 'B', 15);
            $this->Cell(30);
            $this->Cell(120,10,'Reporte de Estados', 0,0,'C');
            // line space
            $this->Ln(20);
        }
        function Footer()
        {
            //Go to 1.5 cm from bottom
            $this->SetY(-15);
            //Select Arial italic 8
            $this->SetFont('Arial','I',8);
            //Print current and total page numbers
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }
?>