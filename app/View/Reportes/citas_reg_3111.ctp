<?php     
    
    App::import('Vendor','xtcpdf');  
    
    // create new PDF document
    $tcpdf = new XTCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $textfont_body = 'freesansi';//'freesans'; // looks better, finer, and more condensed than 'dejavusans'
    $textfont_title = 'freesansbi';
        
    $tcpdf->SetAuthor("EdFnX - Wilmer Eddy Chambi Llica"); 
    $tcpdf->SetAutoPageBreak( true ); 
        
    //set margins
    $tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $tcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    //set image scale factor
    $tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
    //set auto page breaks
    $tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
    $fecha = date('Y-m-d');
    
    //set some language-dependent strings
    //$tcpdf->setLanguageArray($l);
    
    // ---------------------------------------------------------
    
    // set font
    $tcpdf->xfootertext = $current_user['nombres'].' '.$current_user['ap_paterno'].' '.$current_user['ap_materno']; 
    
    // add a page
    $tcpdf->AddPage();
    
    $tcpdf->SetFont($textfont_title, 'B', 13);
    $tcpdf->Ln(5);    
    $tcpdf->Write(0, "REPORTE ANUAL DE ATENCIONES DEL PUESTO DE SALUD CONDURIRI I-3\nPERIODO ENERO A DICIEMBRE DEL ".$fecha, '', 0, 'C', true, 0, false, false, 0);
    
    $tcpdf->Ln(4);
    
     $tcpdf->SetFont($textfont_title, 'B', 10);
        
    // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
    
    // set color for background
    $tcpdf->SetFillColor(255, 255, 255);
    
    $tcpdf->SetFont($textfont_body, '', 10);
    
    $tcpdf->MultiCell(170, 20, "En el Periodo de Enero a Diciembre del ".$fecha." las atenciones se dieron de la siguiente manera como puede apreciarse en el Grafico de Barras que se muestra continuacion.", 0, 'J', 1, 1, 20, 45, true, 0, false, true, 40, 'T');
        
    foreach($operador_citas as $operador_cita):
        
        $tcpdf->Cell(100,7,$operador_cita[0]['count(user_id)'],0,1,'C', 1);
        
        foreach($especialidades_cas as $especialidad_cas):
        
            if($operador_cita['reg_llamadas']['user_id'] == $operador['User']['id']){
                $tcpdf->Cell(100,7,$operador['User']['id']." ".$operador['User']['nombres']." ".$operador['User']['ap_paterno']." ".$operador['User']['ap_materno'],0,1,'C', 1);
            }
            
        endforeach;
        
    endforeach;
    
    $tcpdf->Cell(56,7, 'citas_reg_121',0,0,'C', 1);
    
    $tcpdf->lastPage();
    
    // ---------------------------------------------------------
    
    //Close and output PDF document
    $tcpdf->Output('REPORTE_ANUAL_ATENCIONES_'.$fecha.'.pdf', 'I');
    
    //============================================================+
    // END OF FILE                                                
    //============================================================+
     
?>