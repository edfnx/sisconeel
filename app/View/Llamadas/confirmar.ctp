<?php $this->set('title_for_layout','Confirmar Cita'); ?>

            <div style="text-align: center; width: auto; height: 38px;">
                <!-- margin-left: 200px; width: 300px; height: 700px;-->
                <div style="float: left; border:1px solid #000000; margin-right: 1px;">
                    <div style="float: left; text-align: center; margin-right: 10px; font-size: x-small; background-color: #62ACF5;">
                        Citas Confirmadas<br />Cabina <?php echo $this->Session->read('cabina'); ?>                        
                    </div>
                    <div style="float: left;">
                        <?php
                            echo $llamconftotalcab; 
                        ?>
                    </div>
                </div>
                <div style="float: left; border:1px solid #000000; margin-right: 1px;">
                    <div style="float: left; text-align: center; margin-right: 10px; font-size: x-small; background-color: #62ACF5;">
                        Citas Confirmadas<br /> por el/la operador(a)                           
                    </div>
                    <div style="float: left;">
                        <?php
                            echo $llamconftotaluser; 
                        ?>
                    </div>
                </div>
                <div style="float: left; border:1px solid #000000;">
                    <div style="float: left; text-align: center; margin-right: 10px; font-size: x-small; background-color: #62ACF5;  width: 220px;">
                       Citas Confirmadas Cabina <?php echo $this->Session->read('cabina'); ?><br />
                        por el/la operador(a)
                    </div>
                    <div style="float: left;">
                        <?php
                            echo $llamconfcabuser; 
                        ?>
                    </div>
                </div>                                
            </div>                      
            
            <div style="margin-left: 5%; margin-top: 2%; width: 500px; float: bottom; text-align: center; font-size: small;">
                <!-- margin-left: 200px; width: 300px; height: 700px;-->
                <h1 style="font-size:  small;">Confirmar Cita</h1>   
                                 
                <?php 
                     echo $this->Form->create('ConfLlamada');   
                ?>
                <?php
                    echo $this->Form->hidden('ConfLlamada.turno',
                                                array(
                                                        'value'=>$this->Session->read('turno')
                                                        )
                                                ); 
                ?>
                <?php
                    echo $this->Form->hidden('ConfLlamada.cabina',
                                                array(
                                                        'value'=>$this->Session->read('cabina')
                                                        )
                                                ); 
                ?>                
                <label>
                    Cita por DNI
                </label>
                <div id="divcas">
                    <select id="llamadaid" name="data[ConfLlamada][reg_llamada_id]">
    				    <option>Seleccione DNI</option>
    				    <?php
    					   foreach($llamregsfechatotals as $llamregsfechatotal):
    					      $id = $llamregsfechatotal['RegLlamada']['id'];
    		                  $nombre = $llamregsfechatotal['RegLlamada']['dni_pac'];
    						  echo "<option value='$id'>$nombre</option>";
    				       endforeach;
    					?>
    				</select>
                    <?php
                        echo $this->Ajax->observeField('llamadaid',
                                                array(
                                                        'url'=>array('action'=>'datos'),
                                                        'update'=>'divdatos'
                                                        ));
                    ?>
                </div>
               <label>
                    Datos Personales
                </label>
                <div id="divdatos">
                    
                </div> 
                <label>
                    Respuesta
                </label>
                <select id="casid" name="data[ConfLlamada][respuesta_id]">
			         <option>Seleccione Respuesta</option>
    				 <?php
    				   foreach($respuestas as $respuesta):
    					   $id = $respuesta['Respuesta']['id'];
    		               $nombre = $respuesta['Respuesta']['respuesta'];
    					   echo "<option value='$id'>$nombre</option>";
	                   endforeach;
    					?>
    			</select>                    
                <?php
                     echo $this->Form->input('ConfLlamada.datos_llamada',
                                                array(
                                                        'label'=>'Persona que contesto',
                                                        'placeholder'=>'Nombres Apellidos del familiar',
                                                        //'class'=> "span9"
                                                        )
                                                );
                ?>
                <label>
                    Relacion Familiar
                </label>
                <select id="casid" name="data[ConfLlamada][rel_familiar_id]">
			         <option>Seleccione Relacion</option>
    				 <?php
                        foreach($relaciones as $relacion):
    					    $id = $relacion['RelFamiliar']['id'];
    		                $nombre = $relacion['RelFamiliar']['relacion'];
                            if($id == 1){
                                echo "<option value='$id' selected>$nombre</option>";
                            }else{
                                echo "<option value='$id'>$nombre</option>";   
                            }
	                    endforeach;
    					?>
    			</select>
                <?php
                     echo $this->Form->input('ConfLlamada.observacion',
                                                array(
                                                        'label'=>'Observacion',
                                                        'placeholder'=>'Observacion',
                                                        //'class'=> "span9"
                                                        )
                                                );
                ?>                                
                <?php
                    echo $this->Form->hidden('ConfLlamada.user_id',
                                                array(
                                                        'value'=>$current_user['id']
                                                        )
                                                ); 
                ?>                
                <?php
                    echo $this->Form->end('Confirmar Llamada') 
                ?>
            </div>
            