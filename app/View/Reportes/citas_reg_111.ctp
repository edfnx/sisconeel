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
    $tcpdf->Write(0, "REPORTE ANUAL DE REGITRO DE CITAS DE ESSALUD EN LINEA - RAJUL\nPERIODO ENERO A DICIEMBRE DEL ".$anio, '', 0, 'C', true, 0, false, false, 0);
    
    $tcpdf->Ln(4);
    
     $tcpdf->SetFont($textfont_title, 'B', 10);
        
    // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
    
    // set color for background
    $tcpdf->SetFillColor(255, 255, 255);
    
    $tcpdf->SetFont($textfont_body, '', 10);
    
    $tcpdf->MultiCell(170, 20, "En el Periodo de Enero a Diciembre del ".$anio." el registro de citas se dio de la siguiente manera como puede apreciarse en el Grafico de Barras que se muestra continuacion.", 0, 'J', 1, 1, 20, 45, true, 0, false, true, 40, 'T');
        
    //$tcpdf->Cell(56,7, $this->Session->read('cabina'),'LT',0,'C', 1);
    
    $tcpdf->Cell(56,7, 'citas_reg_111',0,0,'C', 1);
    
    //-----INICIO CUERPO ESTADSITICO ANUAL-----
    
    $tcpdf->SetFont($textfont_title, 'S', 10);
    
    $tcpdf->MultiCell(60, 0, "GRAFICO No 1", 0, 'C', 1, 1, 80, 63, true, 0, false, true, 40, 'T');
    
    
    //ARRAY DE VALORES REALES
    $anio = array($enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$setiembre,$octubre,$noviembre,$diciembre);
    
    //VALOR DE DIVISION DE ALGORITMO
    //$div = 2;
    
    //ARRAY DE VALORES PARA GRAFICAR        
    $anio2 = array($enero/2,$febrero/2,$marzo/2,$abril/2,$mayo/2,$junio/2,$julio/2,$agosto/2,$setiembre/2,$octubre/2,$noviembre/2,$diciembre/2);
    
    
    //ARRAY DE NOMBRES DE MESES
    $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre');
    
    
    //ARRAY DE LETRAS DE MESES
    $letra = array('ENE','FEB','MAR','ABR','MAY','JUN','JUL','AGO','SET','OCT','NOV','DIC');
        
    $mayor = $anio2[0];
          
    $i = 0;
    
    for($i = 0; $i<12; $i++){
        
        if($anio2[$i]>$mayor){
            $mayor = $anio2[$i];
        }                
    }
    
    $sobra = ($mayor % 20);
    
    $falta = 20 - $sobra - 0.5;
        
    $limite = ($mayor + $falta)/2;
    
    $id = $mayor + $falta;
    
    $fila = "";
    
    while($id>=0){
                
                $fila .= $id."\n\n"; 
                $id = $id-20;
            }
    
    
    $tcpdf->SetFont($textfont_body, '', 8);
    
    //CUERPO              
    
    //numeros de linea
    
    $tcpdf->MultiCell(10, $limite, $fila, 0, 0, 1, 0, 40, 75, true, 0, false, true, 40, 'T');
    
    //linea de la y
    
    $tcpdf->MultiCell(5, $limite, '', 'L', 'J', 1, 0, 50, 75, true, 0, false, true, 40, 'T');
    
    $tcpdf->SetFont($textfont_body, '', 8);
    
    
    for($i = 0; $i<12; $i++){
        
        $color[$i][0] = rand(50,170);
        $color[$i][1] = rand(130,250);
        $color[$i][2] = rand(250,255); 
        
        $tcpdf->SetFillColor($color[$i][0], $color[$i][1], $color[$i][2]);
        $tcpdf->MultiCell(10, $anio2[$i], $anio[$i], 1, 'C', 1, 0, 55+(10*$i), $limite - $anio2[$i]+75, true, 0, false, true, 40, 'T');
        //$tcpdf->SetFillColor(255, 255, 255);
        $tcpdf->MultiCell(10, 0, $letra[$i], 0, 'C', 0, 0, 55+(10*$i), $limite+78, true, 0, false, true, 40, 'T');
        
    }
        
    $tcpdf->SetFillColor(255, 255, 255);
    $tcpdf->MultiCell(130, 0, '', 'T', 'J', 1, 1, 50, $limite+75, true, 0, false, true, 40, 'T');
    /* NOMBRES DE LEYENDA
    $tcpdf->SetFont($textfont_body, '', 8);
    
    $fila = 0;
    
    $y = 0;
    
    $f = 0;
    
    for($i = 0; $i<12; $i++){
        
        $tcpdf->SetFillColor($color[$i][0], $color[$i][1], $color[$i][2]);
        $tcpdf->MultiCell(6, 3, $letra[$i], 0, 'C', 1, 0, 45+(24*$y), $limite+84+(6*$f), true, 0, false, true, 40, 'T');
        $tcpdf->MultiCell(26, 3, $meses[$i], 0, 'L', 0, 0, 51+(24*$y), $limite+84+(6*$f), true, 0, false, true, 40, 'T');
        
        if($y==5){ 
            $y=0; 
            $f=$f+1;
        }else{
            $y=$y+1;
        }        
        
    }    
      */
    $tcpdf->Ln(7);
    
    $tcpdf->SetFont($textfont_title, 'S', 10);
    
    $tcpdf->Write(0, "GRAFICO No 1: Grafico del Reporte Anual de Ateniones por mes del Puesto de Salud Conduriri I-3 ", '', 0, 'C', 1, 0, false, false, 0);
    
    //$tcpdf->SetFillColor(rand(0,255), rand(0,255), rand(0,255));
    //$tcpdf->Cell(10,25, "lol" ,'LRT',1,'C', 1);
      
    
    //$tcpdf->MultisCell(0,5, 'Copyright © SYSAAPS Conduriri. Derechos Reservados.'.' '.date('Y-m-d H:i:s'),'T',1,'C');
        
    // reset pointer to the last page
    
    //-----FIN CUERPO ESTADSITICO ANUAL-----
    
    
    $tcpdf->lastPage();
    
    // ---------------------------------------------------------
    
    //Close and output PDF document
    $tcpdf->Output('REPORTE_ANUAL_ATENCIONES_'.$anio.'.pdf', 'I');
    
    //============================================================+
    // END OF FILE                                                
    //============================================================+
     
?>