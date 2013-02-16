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
        $tcpdf->Cell(20,7, "Turno" ,'LT',0,'C', 1); 
        $tcpdf->Cell(20,7, "Cabina" ,'LT',0,'C', 1);
        $tcpdf->Cell(30,7, "DNI" ,'LT',0,'C', 1);
        $tcpdf->Cell(50,7, "CAS" ,'LT',0,'C', 1);
        $tcpdf->Cell(40,7, "Especialidad" ,'LT',0,'C', 1);
        $tcpdf->Cell(20,7, "Estado" ,'LT',0,'C', 1);
        $tcpdf->Cell(36,7, "Fecha Creacion" ,'LT',0,'C', 1);
        $tcpdf->Cell(40,7, "Registrado Por" ,'LRT',1,'C', 1);
        
        $num = 1;
            
        $tcpdf->SetFont($textfont_body, '', 10);
                       
            foreach($enero as $ene): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(20,7, $ene['RegLlamada']['turno'],'LT',0,'C', 1);
                $tcpdf->Cell(20,7, $ene['RegLlamada']['cabina'],'LT',0,'C', 1);
                $tcpdf->Cell(30,7, $ene['RegLlamada']['dni_pac'],'LT',0,'C', 1);
                $tcpdf->Cell(50,7, $ene['Ca']['cas'],'LT',0,'C', 1); 
                $tcpdf->Cell(40,7, $ene['Medico']['espec'] ,'LT',0,'C', 1);
                $tcpdf->Cell(20,7, $ene['RegLlamada']['estado'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $ene['RegLlamada']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(40,7, $ene['User']['username'],'LRT',1,'C', 1);
                                
                $num = $num+1;
            endforeach; 
        $tcpdf->Cell(266,0, '','T',1,'C', 1);
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
                       
            foreach($febrero as $feb): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $feb['RegLlamada']['turno'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $feb['RegLlamada']['cabina'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $feb['RegLlamada']['dni_pac'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $feb['Ca']['cas'],'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $feb['Medico']['espec'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $feb['RegLlamada']['estado'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $feb['RegLlamada']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $feb['User']['username'],'LRT',1,'C', 1);
                                
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
                       
            foreach($marzo as $mar): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $mar['RegLlamada']['turno'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $mar['RegLlamada']['cabina'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $mar['RegLlamada']['dni_pac'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $mar['Ca']['cas'],'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $mar['Medico']['espec'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $mar['RegLlamada']['estado'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $mar['RegLlamada']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $mar['User']['username'],'LRT',1,'C', 1);
                                
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
                       
            foreach($abril as $abr): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $abr['RegLlamada']['turno'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $abr['RegLlamada']['cabina'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $abr['RegLlamada']['dni_pac'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $abr['Ca']['cas'],'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $abr['Medico']['espec'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $abr['RegLlamada']['estado'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $abr['RegLlamada']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $abr['User']['username'],'LRT',1,'C', 1);
                                
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
                       
            foreach($mayo as $may): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $may['RegLlamada']['turno'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $may['RegLlamada']['cabina'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $may['RegLlamada']['dni_pac'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $may['Ca']['cas'],'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $may['Medico']['espec'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $may['RegLlamada']['estado'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $may['RegLlamada']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $may['User']['username'],'LRT',1,'C', 1);
                                
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
                       
            foreach($junio as $jun): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $jun['RegLlamada']['turno'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $jun['RegLlamada']['cabina'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $jun['RegLlamada']['dni_pac'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $jun['Ca']['cas'],'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $jun['Medico']['espec'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $jun['RegLlamada']['estado'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $jun['RegLlamada']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $jun['User']['username'],'LRT',1,'C', 1);
                               
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
                       
            foreach($julio as $jul): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $jul['RegLlamada']['turno'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $jul['RegLlamada']['cabina'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $jul['RegLlamada']['dni_pac'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $jul['Ca']['cas'],'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $jul['Medico']['espec'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $jul['RegLlamada']['estado'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $jul['RegLlamada']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $jul['User']['username'],'LRT',1,'C', 1);
                               
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
                       
            foreach($agosto as $ago): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $ago['RegLlamada']['turno'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $ago['RegLlamada']['cabina'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $ago['RegLlamada']['dni_pac'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $ago['Ca']['cas'],'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $ago['Medico']['espec'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $ago['RegLlamada']['estado'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $ago['RegLlamada']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $ago['User']['username'],'LRT',1,'C', 1);
                                
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
                       
            foreach($setiembre as $set): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $set['RegLlamada']['turno'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $set['RegLlamada']['cabina'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $set['RegLlamada']['dni_pac'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $set['Ca']['cas'],'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $set['Medico']['espec'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $set['RegLlamada']['estado'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $set['RegLlamada']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $set['User']['username'],'LRT',1,'C', 1);
                               
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
                       
            foreach($octubre as $oct): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $oct['RegLlamada']['turno'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $oct['RegLlamada']['cabina'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $oct['RegLlamada']['dni_pac'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $oct['Ca']['cas'],'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $oct['Medico']['espec'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $oct['RegLlamada']['estado'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $oct['RegLlamada']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $oct['User']['username'],'LRT',1,'C', 1);
                               
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
                       
            foreach($noviembre as $nov): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $nov['RegLlamada']['turno'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $nov['RegLlamada']['cabina'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $nov['RegLlamada']['dni_pac'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $nov['Ca']['cas'],'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $nov['Medico']['espec'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $nov['RegLlamada']['estado'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $nov['RegLlamada']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $nov['User']['username'],'LRT',1,'C', 1);
                                
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
                       
            foreach($diciembre as $dic): 
                $tcpdf->SetFont($textfont_body, '', 10);
                
                $tcpdf->Cell(10,7, $num ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $dic['RegLlamada']['turno'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $dic['RegLlamada']['cabina'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $dic['RegLlamada']['dni_pac'],'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $dic['Ca']['cas'],'LT',0,'C', 1); 
                $tcpdf->Cell(56,7, $dic['Medico']['espec'] ,'LT',0,'C', 1);
                $tcpdf->Cell(58,7, $dic['RegLlamada']['estado'] ,'LT',0,'C', 1);
                $tcpdf->Cell(36,7, $dic['RegLlamada']['created'] ,'LT',0,'C', 1);
                $tcpdf->Cell(56,7, $dic['User']['username'],'LRT',1,'C', 1);
                               
                $num = $num+1;
            endforeach; 
        $tcpdf->Cell(272,0, '','T',1,'C', 1);
        }
        
            
    
    $tcpdf->lastPage();
    
    // ---------------------------------------------------------
    
    //Close and output PDF document
    $tcpdf->Output('LISTADO_ANUAL_DE_CITAS_'.$anio.'.pdf', 'I');
    
    //============================================================+
    // END OF FILE                                                
    //============================================================+
     
?>