<?php 
App::import('Vendor','tcpdf/tcpdf'); 

class XTCPDF  extends TCPDF 
{ 

    //var $xheadertext  = 'PDF created using CakePHP and TCPDF'; 
    //var $xheadercolor = array(0,0,100); 

    //var $xfootertext  = 'Copyright Segunda Espec. All rights reserved.'; 
    //var $xfooterfont  = PDF_FONT_NAME_MAIN ; 
    //var $xfooterfontsize = 8 ; 


    /** 
    * Overwrites the default header 
    * set the text in the view using 
    *    $fpdf->xheadertext = 'YOUR ORGANIZATION'; 
    * set the fill color in the view using 
    *    $fpdf->xheadercolor = array(0,0,100); (r, g, b) 
    * set the font in the view using 
    *    $fpdf->setHeaderFont(array('YourFont','',fontsize)); 
    */ 
           
    function Header() 
    {         
        $this->SetFont('freesansbi','','10'); 
        $this->setY(10); // shouldn't be needed due to page margin, but helas, otherwise it's at the page top 
        // set color for background
        $this->SetFillColor(255, 255, 255);
    
        // set color for text
        $this->SetTextColor(9, 103, 232);
        $image_file = K_PATH_IMAGES.'essalud.jpg';         
        $this->Image($image_file, 15, 10, 70, '14', 'JPG', '', 'T', false, 300, '', false, true, 0, false, false, false);
        //$this->Cell(25,5, "", 1,1,'L');
        $this->MultiCell(0, 5, "RED ASISTENCIAL JULIACA - EsSalud En Linea", 0, 'L', 1, 0, '90', '10', true);
        $this->MultiCell(0, 5, "Sistema de Control de EsSalud en Linea", 0, 'L', 1, 0, '90', '15', true);
        $this->MultiCell(0, 5, "SYSCONEEL", 0, 'L', 1, 1, '90', '20', true);
    }   
    /** 
    * Overwrites the default footer 
    * set the text in the view using 
    * $fpdf->xfootertext = 'Copyright Â© %d YOUR ORGANIZATION. All rights reserved.'; 
    */ 
    function Footer() 
    { 
        $footertext = sprintf($this->xfootertext);
        $this->SetY(-20); 
        $this->SetTextColor(0, 0, 0); 
        //$this->SetFont(PDF_FONT_NAME_MAIN,'',8); 
        $this->SetFont(PDF_FONT_NAME_MAIN,'',8);                
        $this->Cell(0,5, 'USUARIO: '.$footertext.' // FECHA:'.date('Y-m-d H:i:s').' // IP:'.$_SERVER['REMOTE_ADDR'],0,0,'L');
        $this->Cell(0,5, 'Pag. ['.$this->getAliasNumPage().' de '.$this->getAliasNbPages().']',0,1,'R');
        $this->Cell(0,5, 'RAJUL - OFICINA DE SOPORTE INFORMATICO - WECHLL © Copyright 2013 - Derechos Reservados.','T',1,'C'); 
        
        /* $_SERVER['REMOTE_ADDR'];
        $year = date('Y'); 
        $footertext = sprintf($this->xfootertext, $year); 
        $this->SetY(-20); 
        $this->SetTextColor(0, 0, 0); 
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize); 
        $this->Cell(0,8, $footertext,'T',1,'C');*/
    } 
        
} 
?>