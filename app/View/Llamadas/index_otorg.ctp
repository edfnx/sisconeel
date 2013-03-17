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
                             
    $tcpdf->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
        
    //$tcpdf = new XTCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
    
    $tcpdf->SetFont($textfont_title, 'B', 13);
    $tcpdf->Ln(5);    
    $tcpdf->Write(0, "RELACION COMPLETA DE CITAS OTORGADAS DE ESSALUD EN LINEA\nDE FECHA ".$fecha." DE  ".strtoupper($current_user['nombres']." ".$current_user['ap_paterno']." ".$current_user['ap_materno']), '', 0, 'C', true, 0, false, false, 0);
        
    $tcpdf->Ln(10);
        
    $tcpdf->SetFont($textfont_title, 'B', 10);
        
    $tcpdf->SetFillColor(255, 255, 255);
        
    // set color for text
    $tcpdf->SetTextColor(0, 0, 0);
    
    $tcpdf->SetFont($textfont_body, '', 10);
                    
    if(empty($llamotorgtotalusers)){
        $tcpdf->Cell(70,7, "No ha Registrado Ninguna Cita" ,0,0,'C', 1);
    } else { 
        
        $tcpdf->Cell(10,7, "Num" ,'LT',0,'C', 1);
        $tcpdf->Cell(20,7, "Turno" ,'LT',0,'C', 1); 
        $tcpdf->Cell(15,7, "Cabina" ,'LT',0,'C', 1);
        $tcpdf->Cell(20,7, "DNI" ,'LT',0,'C', 1);
        $tcpdf->Cell(50,7, "CAS" ,'LT',0,'C', 1);
        $tcpdf->Cell(50,7, "Especialidad" ,'LT',0,'C', 1);
        $tcpdf->Cell(40,7, "Fecha Cita" ,'LT',0,'C', 1);
        $tcpdf->Cell(20,7, "Estado" ,'LT',0,'C', 1);
        $tcpdf->Cell(40,7, "Creacion" ,'LRT',1,'C', 1);
        
        $num = 1;
            
        $tcpdf->SetFont($textfont_body, '', 10);
                       
            foreach ($llamotorgtotalusers as $llamotorgtotaluser):
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                
                if($llamotorgtotaluser['RegLlamada']['turno']=="manana"){
                    $tcpdf->Cell(20,7, "Mañana",'LT',0,'C', 1);
                }else if($llamotorgtotaluser['RegLlamada']['turno']=="tarde"){
                    $tcpdf->Cell(20,7, "Tarde",'LT',0,'C', 1);
                }else{
                    $tcpdf->Cell(20,7, "Apoyo",'LT',0,'C', 1);
                }
                
                $tcpdf->Cell(15,7, $llamotorgtotaluser['Cabina']['cabina'],'LT',0,'C', 1);
                $tcpdf->Cell(20,7, $llamotorgtotaluser['RegLlamada']['dni_pac'],'LT',0,'C', 1);
                $tcpdf->Cell(50,7, $llamotorgtotaluser['Ca']['cas'],'LT',0,'C', 1); 
                $tcpdf->Cell(50,7, $llamotorgtotaluser['Especialidade']['especialidad'] ,'LT',0,'C', 1);
                $tcpdf->Cell(40,7, $llamotorgtotaluser['RegLlamada']['fecha_cita'] ,'LT',0,'C', 1);
                
                if($llamotorgtotaluser['RegLlamada']['estado']=='conf'){
                    $tcpdf->Cell(20,7, "Confirmada",'LT',0,'C', 1);                    
                }else if($llamotorgtotaluser['RegLlamada']['estado']=='elim'){
                    $tcpdf->Cell(20,7, "Eliminada",'LT',0,'C', 1);
                }else{
                    $tcpdf->Cell(20,7, "Stand by",'LT',0,'C', 1);
                }
                
                $tcpdf->Cell(40,7, $llamotorgtotaluser['RegLlamada']['created'] ,'LTR',1,'C', 1);
                                
                $num = $num+1;
            endforeach; 
        
        $tcpdf->Cell(265,0, '','T',1,'C', 1);
    }
    
    $tcpdf->lastPage();
    
    // ---------------------------------------------------------
    
    //Close and output PDF document
    $tcpdf->Output('LISTADO_DE_CITAS_OTORGADAS_'.'DEL_'.$fecha.'_DE_'.$current_user['nombres'].'_'.$current_user['ap_paterno'].'_'.$current_user['ap_materno'].'.pdf', 'I');
    
    //============================================================+
    // END OF FILE                                                
    //============================================================+
     
?>