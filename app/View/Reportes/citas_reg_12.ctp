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
        
    //ENERO 1    
   if(empty($enero)){ 
                                               
   } else {
                        
        $tcpdf->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
        
        //$tcpdf = new XTCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        
        $tcpdf->SetFont($textfont_title, 'B', 13);
        $tcpdf->Ln(5);    
        $tcpdf->Write(0, "RELACION COMPLETA DE CITAS REGISTRADAS DE ESSALUD EN LINEA\nDE ENERO DEL ".$anio, '', 0, 'C', true, 0, false, false, 0);
        
        $tcpdf->Ln(10);
        
        $tcpdf->SetFont($textfont_title, 'B', 10);
        
        $tcpdf->SetFillColor(255, 255, 255);
        
        // set color for text
        $tcpdf->SetTextColor(0, 0, 0);
        
        //foreach($fichauno as $ficha1);
        
        $tcpdf->Cell(10,7, "Num" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Turno" ,'LT',0,'C', 1); 
        $tcpdf->Cell(56,7, "Cabina" ,'LT',0,'C', 1);
        $tcpdf->Cell(58,7, "DNI" ,'LT',0,'C', 1);
        $tcpdf->Cell(58,7, "CAS" ,'LT',0,'C', 1);
        $tcpdf->Cell(58,7, "Especialidad" ,'LT',0,'C', 1);
        $tcpdf->Cell(58,7, "Estado" ,'LT',0,'C', 1);
        $tcpdf->Cell(36,7, "Fecha Creacion" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Registrado Por" ,'LRT',1,'C', 1);
        
        $num = 1;
            
        $tcpdf->SetFont($textfont_body, '', 10);
                       
            foreach($ene as $ener): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $enero['RegLlamada']['turno'],'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $enero['Atencione']['personal_medico'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $enero['Atencione']['descripcion'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $enero['Atencione']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $enero['User']['ap_paterno']." ".$ener['User']['ap_materno']." ".$ener['User']['nombres'] ,'LRT',1,'C', 1);
                                
                $num = $num+1;
            endforeach; 
        $tcpdf->Cell(272,0, '','T',1,'C', 1);
        }
        
   //FEBRERO 2
   if(empty($febrero)){ 
                                               
   } else {
                        
        $tcpdf->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
        
        //$tcpdf = new XTCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        
        $tcpdf->SetFont($textfont_title, 'B', 13);
        $tcpdf->Ln(5);    
        $tcpdf->Write(0, "RELACION COMPLETA DE CITAS REGISTRADAS DE ESSALUD EN LINEA\nDE ENERO DEL ".$anio, '', 0, 'C', true, 0, false, false, 0);
        
        $tcpdf->Ln(10);
        
        $tcpdf->SetFont($textfont_title, 'B', 10);
        
        $tcpdf->SetFillColor(255, 255, 255);
        
        // set color for text
        $tcpdf->SetTextColor(0, 0, 0);
        
        //foreach($fichauno as $ficha1);
        
        $tcpdf->Cell(10,7, "Num" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Nombre Paciente" ,'LT',0,'C', 1); 
        $tcpdf->Cell(56,7, "Personal Atencion" ,'LT',0,'C', 1);
        $tcpdf->Cell(58,7, "Descripcion" ,'LT',0,'C', 1);
        $tcpdf->Cell(36,7, "Fecha Creacion" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Registrado Por" ,'LRT',1,'C', 1);
        
        $num = 1;
            
        $tcpdf->SetFont($textfont_body, '', 10);
                       
            foreach($feb as $febr): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $febr['Paciente']['ap_paterno']." ".$febr['Paciente']['ap_materno']." ".$febr['Paciente']['nombres'] ,'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $febr['Atencione']['personal_medico'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $febr['Atencione']['descripcion'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $febr['Atencione']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $febr['User']['ap_paterno']." ".$febr['User']['ap_materno']." ".$febr['User']['nombres'] ,'LRT',1,'C', 1);
                                
                $num = $num+1;
            endforeach; 
        $tcpdf->Cell(272,0, '','T',1,'C', 1);
        }
   
    // MARZO 3        
   if(empty($marzo)){ 
                                               
   } else {
                        
        $tcpdf->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
        
        //$tcpdf = new XTCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        
        $tcpdf->SetFont($textfont_title, 'B', 13);
        $tcpdf->Ln(5);    
        $tcpdf->Write(0, "RELACION COMPLETA DE CITAS REGISTRADAS DE ESSALUD EN LINEA\nDE ENERO DEL ".$anio, '', 0, 'C', true, 0, false, false, 0);
        
        $tcpdf->Ln(10);
        
        $tcpdf->SetFont($textfont_title, 'B', 10);
        
        $tcpdf->SetFillColor(255, 255, 255);
        
        // set color for text
        $tcpdf->SetTextColor(0, 0, 0);
        
        //foreach($fichauno as $ficha1);
        
        $tcpdf->Cell(10,7, "Num" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Nombre Paciente" ,'LT',0,'C', 1); 
        $tcpdf->Cell(56,7, "Personal Atencion" ,'LT',0,'C', 1);
        $tcpdf->Cell(58,7, "Descripcion" ,'LT',0,'C', 1);
        $tcpdf->Cell(36,7, "Fecha Creacion" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Registrado Por" ,'LRT',1,'C', 1);
        
        $num = 1;
            
        $tcpdf->SetFont($textfont_body, '', 10);
                       
            foreach($mar as $marz): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $marz['Paciente']['ap_paterno']." ".$marz['Paciente']['ap_materno']." ".$marz['Paciente']['nombres'] ,'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $marz['Atencione']['personal_medico'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $marz['Atencione']['descripcion'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $marz['Atencione']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $marz['User']['ap_paterno']." ".$marz['User']['ap_materno']." ".$marz['User']['nombres'] ,'LRT',1,'C', 1);
                                
                $num = $num+1;
            endforeach; 
        $tcpdf->Cell(272,0, '','T',1,'C', 1);
        }
   
   //ABRIL 4
   if(empty($abril)){ 
                                               
   } else {
                        
        $tcpdf->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
        
        //$tcpdf = new XTCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        
        $tcpdf->SetFont($textfont_title, 'B', 13);
        $tcpdf->Ln(5);    
        $tcpdf->Write(0, "RELACION COMPLETA DE CITAS REGISTRADAS DE ESSALUD EN LINEA\nDE ENERO DEL ".$anio, '', 0, 'C', true, 0, false, false, 0);
        
        $tcpdf->Ln(10);
        
        $tcpdf->SetFont($textfont_title, 'B', 10);
        
        $tcpdf->SetFillColor(255, 255, 255);
        
        // set color for text
        $tcpdf->SetTextColor(0, 0, 0);
        
        //foreach($fichauno as $ficha1);
        
        $tcpdf->Cell(10,7, "Num" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Nombre Paciente" ,'LT',0,'C', 1); 
        $tcpdf->Cell(56,7, "Personal Atencion" ,'LT',0,'C', 1);
        $tcpdf->Cell(58,7, "Descripcion" ,'LT',0,'C', 1);
        $tcpdf->Cell(36,7, "Fecha Creacion" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Registrado Por" ,'LRT',1,'C', 1);
        
        $num = 1;
            
        $tcpdf->SetFont($textfont_body, '', 10);
                       
            foreach($abr as $abri): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $abri['Paciente']['ap_paterno']." ".$abri['Paciente']['ap_materno']." ".$abri['Paciente']['nombres'] ,'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $abri['Atencione']['personal_medico'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $abri['Atencione']['descripcion'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $abri['Atencione']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $abri['User']['ap_paterno']." ".$abri['User']['ap_materno']." ".$abri['User']['nombres'] ,'LRT',1,'C', 1);
                                
                $num = $num+1;
            endforeach; 
        $tcpdf->Cell(272,0, '','T',1,'C', 1);
        }
   
   //MAYO 5    
   if(empty($mayo)){ 
                                               
   } else {
                        
        $tcpdf->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
        
        //$tcpdf = new XTCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        
        $tcpdf->SetFont($textfont_title, 'B', 13);
        $tcpdf->Ln(5);    
        $tcpdf->Write(0, "RELACION COMPLETA DE CITAS REGISTRADAS DE ESSALUD EN LINEA\nDE ENERO DEL ".$anio, '', 0, 'C', true, 0, false, false, 0);
        
        $tcpdf->Ln(10);
        
        $tcpdf->SetFont($textfont_title, 'B', 10);
        
        $tcpdf->SetFillColor(255, 255, 255);
        
        // set color for text
        $tcpdf->SetTextColor(0, 0, 0);
        
        //foreach($fichauno as $ficha1);
        
        $tcpdf->Cell(10,7, "Num" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Nombre Paciente" ,'LT',0,'C', 1); 
        $tcpdf->Cell(56,7, "Personal Atencion" ,'LT',0,'C', 1);
        $tcpdf->Cell(58,7, "Descripcion" ,'LT',0,'C', 1);
        $tcpdf->Cell(36,7, "Fecha Creacion" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Registrado Por" ,'LRT',1,'C', 1);
        
        $num = 1;
            
        $tcpdf->SetFont($textfont_body, '', 10);
                       
            foreach($may as $mayo): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $mayo['Paciente']['ap_paterno']." ".$mayo['Paciente']['ap_materno']." ".$mayo['Paciente']['nombres'] ,'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $mayo['Atencione']['personal_medico'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $mayo['Atencione']['descripcion'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $mayo['Atencione']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $mayo['User']['ap_paterno']." ".$mayo['User']['ap_materno']." ".$mayo['User']['nombres'] ,'LRT',1,'C', 1);
                                
                $num = $num+1;
            endforeach; 
        $tcpdf->Cell(272,0, '','T',1,'C', 1);
        }
        
   //JUNIO 6
   if(empty($junio)){ 
                                               
   } else {
                        
        $tcpdf->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
        
        //$tcpdf = new XTCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        
        $tcpdf->SetFont($textfont_title, 'B', 13);
        $tcpdf->Ln(5);    
        $tcpdf->Write(0, "RELACION COMPLETA DE CITAS REGISTRADAS DE ESSALUD EN LINEA\nDE ENERO DEL ".$anio, '', 0, 'C', true, 0, false, false, 0);
        
        $tcpdf->Ln(10);
        
        $tcpdf->SetFont($textfont_title, 'B', 10);
        
        $tcpdf->SetFillColor(255, 255, 255);
        
        // set color for text
        $tcpdf->SetTextColor(0, 0, 0);
        
        //foreach($fichauno as $ficha1);
        
        $tcpdf->Cell(10,7, "Num" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Nombre Paciente" ,'LT',0,'C', 1); 
        $tcpdf->Cell(56,7, "Personal Atencion" ,'LT',0,'C', 1);
        $tcpdf->Cell(58,7, "Descripcion" ,'LT',0,'C', 1);
        $tcpdf->Cell(36,7, "Fecha Creacion" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Registrado Por" ,'LRT',1,'C', 1);
        
        $num = 1;
            
        $tcpdf->SetFont($textfont_body, '', 10);
                       
            foreach($jun as $juni): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $juni['Paciente']['ap_paterno']." ".$juni['Paciente']['ap_materno']." ".$juni['Paciente']['nombres'] ,'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $juni['Atencione']['personal_medico'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $juni['Atencione']['descripcion'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $juni['Atencione']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $juni['User']['ap_paterno']." ".$juni['User']['ap_materno']." ".$juni['User']['nombres'] ,'LRT',1,'C', 1);
                                
                $num = $num+1;
            endforeach; 
        $tcpdf->Cell(272,0, '','T',1,'C', 1);
        }
        
   //JULIO 7
   if(empty($julio)){ 
                                               
   } else {
                        
        $tcpdf->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
        
        //$tcpdf = new XTCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        
        $tcpdf->SetFont($textfont_title, 'B', 13);
        $tcpdf->Ln(5);    
        $tcpdf->Write(0, "RELACION COMPLETA DE CITAS REGISTRADAS DE ESSALUD EN LINEA\nDE ENERO DEL ".$anio, '', 0, 'C', true, 0, false, false, 0);
        
        $tcpdf->Ln(10);
        
        $tcpdf->SetFont($textfont_title, 'B', 10);
        
        $tcpdf->SetFillColor(255, 255, 255);
        
        // set color for text
        $tcpdf->SetTextColor(0, 0, 0);
        
        //foreach($fichauno as $ficha1);
        
        $tcpdf->Cell(10,7, "Num" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Nombre Paciente" ,'LT',0,'C', 1); 
        $tcpdf->Cell(56,7, "Personal Atencion" ,'LT',0,'C', 1);
        $tcpdf->Cell(58,7, "Descripcion" ,'LT',0,'C', 1);
        $tcpdf->Cell(36,7, "Fecha Creacion" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Registrado Por" ,'LRT',1,'C', 1);
        
        $num = 1;
            
        $tcpdf->SetFont($textfont_body, '', 10);
                       
            foreach($jul as $juli): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $juli['Paciente']['ap_paterno']." ".$juli['Paciente']['ap_materno']." ".$juli['Paciente']['nombres'] ,'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $juli['Atencione']['personal_medico'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $juli['Atencione']['descripcion'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $juli['Atencione']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $juli['User']['ap_paterno']." ".$juli['User']['ap_materno']." ".$juli['User']['nombres'] ,'LRT',1,'C', 1);
                                
                $num = $num+1;
            endforeach; 
        $tcpdf->Cell(272,0, '','T',1,'C', 1);
        }
        
   //AGOSTO 8     
   if(empty($agosto)){ 
                                               
   } else {
                        
        $tcpdf->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
        
        //$tcpdf = new XTCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        
        $tcpdf->SetFont($textfont_title, 'B', 13);
        $tcpdf->Ln(5);    
        $tcpdf->Write(0, "RELACION COMPLETA DE CITAS REGISTRADAS DE ESSALUD EN LINEA\nDE ENERO DEL ".$anio, '', 0, 'C', true, 0, false, false, 0);
        
        $tcpdf->Ln(10);
        
        $tcpdf->SetFont($textfont_title, 'B', 10);
        
        $tcpdf->SetFillColor(255, 255, 255);
        
        // set color for text
        $tcpdf->SetTextColor(0, 0, 0);
        
        //foreach($fichauno as $ficha1);
        
        $tcpdf->Cell(10,7, "Num" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Nombre Paciente" ,'LT',0,'C', 1); 
        $tcpdf->Cell(56,7, "Personal Atencion" ,'LT',0,'C', 1);
        $tcpdf->Cell(58,7, "Descripcion" ,'LT',0,'C', 1);
        $tcpdf->Cell(36,7, "Fecha Creacion" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Registrado Por" ,'LRT',1,'C', 1);
        
        $num = 1;
            
        $tcpdf->SetFont($textfont_body, '', 10);
                       
            foreach($ago as $agos): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $agos['Paciente']['ap_paterno']." ".$agos['Paciente']['ap_materno']." ".$agos['Paciente']['nombres'] ,'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $agos['Atencione']['personal_medico'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $agos['Atencione']['descripcion'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $agos['Atencione']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $agos['User']['ap_paterno']." ".$agos['User']['ap_materno']." ".$agos['User']['nombres'] ,'LRT',1,'C', 1);
                                
                $num = $num+1;
            endforeach; 
        $tcpdf->Cell(272,0, '','T',1,'C', 1);
        }
        
   //SETIEMBRE 9    
   if(empty($setiembre)){ 
                                               
   } else {
                        
        $tcpdf->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
        
        //$tcpdf = new XTCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        
        $tcpdf->SetFont($textfont_title, 'B', 13);
        $tcpdf->Ln(5);    
        $tcpdf->Write(0, "RELACION COMPLETA DE CITAS REGISTRADAS DE ESSALUD EN LINEA\nDE ENERO DEL ".$anio, '', 0, 'C', true, 0, false, false, 0);
        
        $tcpdf->Ln(10);
        
        $tcpdf->SetFont($textfont_title, 'B', 10);
        
        $tcpdf->SetFillColor(255, 255, 255);
        
        // set color for text
        $tcpdf->SetTextColor(0, 0, 0);
        
        //foreach($fichauno as $ficha1);
        
        $tcpdf->Cell(10,7, "Num" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Nombre Paciente" ,'LT',0,'C', 1); 
        $tcpdf->Cell(56,7, "Personal Atencion" ,'LT',0,'C', 1);
        $tcpdf->Cell(58,7, "Descripcion" ,'LT',0,'C', 1);
        $tcpdf->Cell(36,7, "Fecha Creacion" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Registrado Por" ,'LRT',1,'C', 1);
        
        $num = 1;
            
        $tcpdf->SetFont($textfont_body, '', 10);
                       
            foreach($set as $seti): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $seti['Paciente']['ap_paterno']." ".$seti['Paciente']['ap_materno']." ".$seti['Paciente']['nombres'] ,'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $seti['Atencione']['personal_medico'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $seti['Atencione']['descripcion'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $seti['Atencione']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $seti['User']['ap_paterno']." ".$seti['User']['ap_materno']." ".$seti['User']['nombres'] ,'LRT',1,'C', 1);
                                
                $num = $num+1;
            endforeach; 
        $tcpdf->Cell(272,0, '','T',1,'C', 1);
        }
        
   //OCTUBRE 10     
   if(empty($octubre)){ 
                                               
   } else {
                        
        $tcpdf->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
        
        //$tcpdf = new XTCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        
        $tcpdf->SetFont($textfont_title, 'B', 13);
        $tcpdf->Ln(5);    
        $tcpdf->Write(0, "RELACION COMPLETA DE CITAS REGISTRADAS DE ESSALUD EN LINEA\nDE ENERO DEL ".$anio, '', 0, 'C', true, 0, false, false, 0);
        
        $tcpdf->Ln(10);
        
        $tcpdf->SetFont($textfont_title, 'B', 10);
        
        $tcpdf->SetFillColor(255, 255, 255);
        
        // set color for text
        $tcpdf->SetTextColor(0, 0, 0);
        
        //foreach($fichauno as $ficha1);
        
        $tcpdf->Cell(10,7, "Num" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Nombre Paciente" ,'LT',0,'C', 1); 
        $tcpdf->Cell(56,7, "Personal Atencion" ,'LT',0,'C', 1);
        $tcpdf->Cell(58,7, "Descripcion" ,'LT',0,'C', 1);
        $tcpdf->Cell(36,7, "Fecha Creacion" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Registrado Por" ,'LRT',1,'C', 1);
        
        $num = 1;
            
        $tcpdf->SetFont($textfont_body, '', 10);
                       
            foreach($oct as $octu): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $octu['Paciente']['ap_paterno']." ".$octu['Paciente']['ap_materno']." ".$octu['Paciente']['nombres'] ,'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $octu['Atencione']['personal_medico'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $octu['Atencione']['descripcion'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $octu['Atencione']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $octu['User']['ap_paterno']." ".$octu['User']['ap_materno']." ".$octu['User']['nombres'] ,'LRT',1,'C', 1);
                                
                $num = $num+1;
            endforeach; 
        $tcpdf->Cell(272,0, '','T',1,'C', 1);
        }
        
   //NOVIEMBRE 11     
   if(empty($noviembre)){ 
                                               
   } else {
                        
        $tcpdf->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
        
        //$tcpdf = new XTCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        
        $tcpdf->SetFont($textfont_title, 'B', 13);
        $tcpdf->Ln(5);    
        $tcpdf->Write(0, "RELACION COMPLETA DE CITAS REGISTRADAS DE ESSALUD EN LINEA\nDE ENERO DEL ".$anio, '', 0, 'C', true, 0, false, false, 0);
        
        $tcpdf->Ln(10);
        
        $tcpdf->SetFont($textfont_title, 'B', 10);
        
        $tcpdf->SetFillColor(255, 255, 255);
        
        // set color for text
        $tcpdf->SetTextColor(0, 0, 0);
        
        //foreach($fichauno as $ficha1);
        
        $tcpdf->Cell(10,7, "Num" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Nombre Paciente" ,'LT',0,'C', 1); 
        $tcpdf->Cell(56,7, "Personal Atencion" ,'LT',0,'C', 1);
        $tcpdf->Cell(58,7, "Descripcion" ,'LT',0,'C', 1);
        $tcpdf->Cell(36,7, "Fecha Creacion" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Registrado Por" ,'LRT',1,'C', 1);
        
        $num = 1;
            
        $tcpdf->SetFont($textfont_body, '', 10);
                       
            foreach($nov as $novi): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $novi['Paciente']['ap_paterno']." ".$novi['Paciente']['ap_materno']." ".$novi['Paciente']['nombres'] ,'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $novi['Atencione']['personal_medico'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $novi['Atencione']['descripcion'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $novi['Atencione']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $novi['User']['ap_paterno']." ".$novi['User']['ap_materno']." ".$novi['User']['nombres'] ,'LRT',1,'C', 1);
                                
                $num = $num+1;
            endforeach; 
        $tcpdf->Cell(272,0, '','T',1,'C', 1);
        }
        
   //DICIEMBRE 12     
   if(empty($diciembre)){ 
                                               
   } else {
                        
        $tcpdf->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
        
        //$tcpdf = new XTCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        
        $tcpdf->SetFont($textfont_title, 'B', 13);
        $tcpdf->Ln(5);    
        $tcpdf->Write(0, "RELACION COMPLETA DE CITAS REGISTRADAS DE ESSALUD EN LINEA\nDE ENERO DEL ".$anio, '', 0, 'C', true, 0, false, false, 0);
        
        $tcpdf->Ln(10);
        
        $tcpdf->SetFont($textfont_title, 'B', 10);
        
        $tcpdf->SetFillColor(255, 255, 255);
        
        // set color for text
        $tcpdf->SetTextColor(0, 0, 0);
        
        //foreach($fichauno as $ficha1);
        
        $tcpdf->Cell(10,7, "Num" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Nombre Paciente" ,'LT',0,'C', 1); 
        $tcpdf->Cell(56,7, "Personal Atencion" ,'LT',0,'C', 1);
        $tcpdf->Cell(58,7, "Descripcion" ,'LT',0,'C', 1);
        $tcpdf->Cell(36,7, "Fecha Creacion" ,'LT',0,'C', 1);
        $tcpdf->Cell(56,7, "Registrado Por" ,'LRT',1,'C', 1);
        
        $num = 1;
            
        $tcpdf->SetFont($textfont_body, '', 10);
                       
            foreach($dic as $dici): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $dici['Paciente']['ap_paterno']." ".$dici['Paciente']['ap_materno']." ".$dici['Paciente']['nombres'] ,'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $dici['Atencione']['personal_medico'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $dici['Atencione']['descripcion'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $dici['Atencione']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $dici['User']['ap_paterno']." ".$dici['User']['ap_materno']." ".$dici['User']['nombres'] ,'LRT',1,'C', 1);
                                
                $num = $num+1;
            endforeach; 
        $tcpdf->Cell(272,0, '','T',1,'C', 1);
        }
        
            
    
    $tcpdf->lastPage();
    
    // ---------------------------------------------------------
    
    //Close and output PDF document
    $tcpdf->Output('REPORTE_ANUAL_ATENCIONES_'.$fecha.'.pdf', 'I');
    
    //============================================================+
    // END OF FILE                                                
    //============================================================+
     
?>