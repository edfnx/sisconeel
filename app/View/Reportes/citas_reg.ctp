<div style="margin-left: 5%; margin-top: 2%; width: 500px; float: bottom; text-align: left; font-size: small;">
    
    <div style="text-align: center; font-size: large; margin-bottom: 15px;">
        COMPLETO
    </div>
    <div style="font-size: small; margin-bottom: 20px;">
        <?php 
         echo $this->Form->create('Completo',array('target'=>'_blank'));   
        ?>
        
        <?php
                    echo $this->Form->hidden('Completo.form',
                                                array(
                                                        'value'=>1
                                                        )
                                                ); 
        ?>
        
        <p>
            <label>TIPO REPORTE</label>
            <?php       
                echo $this->Form->select('Completo.tipo',
                                            array(  '1'=>'Estadistico',
                                                    '2'=>'Listado',
                                                    '3'=>'Ambos'
                                                    ),
                                            array('empty'=>false,'value'=>'1')
                                            );                                                    
            ?>
        </p>
                
        <p>
            <label>A&Ntilde;O</label>
            <select id="casid" name="data[Completo][anio]">
    				    <?php
                            
                            $anio_count = 2013 - date('Y');
                            
                            $anio = 2013;
                                                        
                            while($anio_count >= 0){
                                
    						    if($anio == date('Y')){
                                    echo "<option value='$anio' selected>$anio</option>";
                                }else{
                                    echo "<option value='$anio'>$anio</option>";
                                }
                                
                                $anio = $anio+1;
                                $anio_count = $anio_count - 1; 
    					    }                           
    					?>
            </select>           
            
        </p>        
        
        <p>
            <label>MES</label>
            <?php       
                echo $this->Form->select('Completo.mes',
                                            array(  '01'=>'Enero',
                                                    '02'=>'Febrero',
                                                    '03'=>'Marzo',
                                                    '04'=>'Abril',
                                                    '05'=>'Mayo',
                                                    '06'=>'Junio',
                                                    '07'=>'Julio',
                                                    '08'=>'Agosto',
                                                    '09'=>'Setiembre',
                                                    '10'=>'Octubre',
                                                    '11'=>'Noviembre',
                                                    '12'=>'Diciembre'
                                                    ),
                                            array('empty'=>'Todos')
                                            );                                                    
            ?>
        </p>
        
        <?php
            echo $this->Form->end('Generar Reporte') 
        ?>                
    </div>
    <div style="text-align: center; font-size: large; margin-bottom: 15px;">
        POR OPERADOR(A)
    </div>
    <div style="font-size: small; margin-bottom: 20px;">
        <?php 
         echo $this->Form->create('Operador',array('target'=>'_blank'));   
        ?>
        
        <?php
                    echo $this->Form->hidden('Operador.form',
                                                array(
                                                        'value'=>2
                                                        )
                                                ); 
        ?>
        
        <p>
            <label>TIPO REPORTE</label>
            <?php       
                echo $this->Form->select('Completo.tipo',
                                            array(  '1'=>'Estadistico',
                                                    '2'=>'Listado',
                                                    '3'=>'Ambos'
                                                    ),
                                            array('empty'=>false,'value'=>'1')
                                            );                                                    
            ?>
        </p>
                
        <p>
            <label>A&Ntilde;O</label>
            <select id="casid" name="data[Operador][anio]">
    				    <?php
                            
                            $anio_count = 2013 - date('Y');
                            
                            $anio = 2013;
                                                        
                            while($anio_count >= 0){
                                
    						    if($anio == date('Y')){
                                    echo "<option value='$anio' selected>$anio</option>";
                                }else{
                                    echo "<option value='$anio'>$anio</option>";
                                }
                                
                                $anio = $anio+1;
                                $anio_count = $anio_count - 1; 
    					    }                           
    					?>
            </select>           
            
        </p>        
        
        <p>
            <label>MES</label>
            <?php       
                echo $this->Form->select('Operador.mes',
                                            array(  '01'=>'Enero',
                                                    '02'=>'Febrero',
                                                    '03'=>'Marzo',
                                                    '04'=>'Abril',
                                                    '05'=>'Mayo',
                                                    '06'=>'Junio',
                                                    '07'=>'Julio',
                                                    '08'=>'Agosto',
                                                    '09'=>'Setiembre',
                                                    '10'=>'Octubre',
                                                    '11'=>'Noviembre',
                                                    '12'=>'Diciembre'
                                                    ),
                                            array('empty'=>'Todos')
                                            );                                                    
            ?>
        </p>
        <p>
           <label>
                Operador(a)
           </label>
           <select id="obs" name="data[Operador][operador]">
        	   <option value="0">Todos</option>
                    <?php
        			     foreach($operadores as $operador):
					          $id = $operador['User']['id'];
        		              $nombre = $operador['User']['nombres']." ".$operador['User']['ap_paterno']." ".$operador['User']['ap_materno'];
        					   
                                if($operador['User']['role'] != "admin"){
                                    echo "<option value='$id'>$nombre</option>";
                                }   
    	                 endforeach;
    			     ?>
    	   </select>
        </p>
        
        <?php
            echo $this->Form->end('Generar Reporte') 
        ?>        
    </div>
    <div style="text-align: center; font-size: large; margin-bottom: 15px;">
        CAS
    </div>
    <div style="font-size: small; margin-bottom: 20px;">
        <?php 
         echo $this->Form->create('Cas',array('target'=>'_blank'));   
        ?>
        
        <?php
                    echo $this->Form->hidden('Cas.form',
                                                array(
                                                        'value'=>3
                                                        )
                                                ); 
        ?>
        
        <p>
            <label>TIPO REPORTE</label>
            <?php       
                echo $this->Form->select('Completo.tipo',
                                            array(  '1'=>'Estadistico',
                                                    '2'=>'Listado',
                                                    '3'=>'Ambos'
                                                    ),
                                            array('empty'=>false,'value'=>'1')
                                            );                                                    
            ?>
        </p>
                
        <p>
            <label>A&Ntilde;O</label>
            <select id="casid" name="data[Cas][anio]">
                	    <?php
                            
                            $anio_count = 2013 - date('Y');
                            
                            $anio = 2013;
                                                        
                            while($anio_count >= 0){
                                
                                if($anio == date('Y')){
                                    echo "<option value='$anio' selected>$anio</option>";
                                }else{
                                    echo "<option value='$anio'>$anio</option>";
                                }    						        
                                
                                $anio = $anio+1;
                                $anio_count = $anio_count - 1; 
    					    }                           
    					?>
            </select>           
            
        </p>        
        
        <p>
            <label>MES</label>
            <?php       
                echo $this->Form->select('Cas.mes',
                                            array(  '01'=>'Enero',
                                                    '02'=>'Febrero',
                                                    '03'=>'Marzo',
                                                    '04'=>'Abril',
                                                    '05'=>'Mayo',
                                                    '06'=>'Junio',
                                                    '07'=>'Julio',
                                                    '08'=>'Agosto',
                                                    '09'=>'Setiembre',
                                                    '10'=>'Octubre',
                                                    '11'=>'Noviembre',
                                                    '12'=>'Diciembre'
                                                    ),
                                            array('empty'=>'Todos')
                                            );                                                    
            ?>
        </p>
        <p>
           <label>
                CAS
           </label>
           <select id="obs" name="data[Cas][cas]">
        	   <option value="0">CAS</option>
                    <?php
        			     foreach($cas as $ca):
					          $id = $ca['Ca']['id'];
        		              $nombre = $ca['Ca']['cas'];
        					   
                              echo "<option value='$id'>$nombre</option>";
                                 
    	                 endforeach;
    			     ?>
    	   </select>
        </p>
        
        <?php
            echo $this->Form->end('Generar Reporte') 
        ?>       
    </div>
</div>