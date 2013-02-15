<?php $this->set('title_for_layout','Registrar Cita'); ?>
            
            <div style="text-align: center; width: auto; height: 38px;">
                <!-- margin-left: 200px; width: 300px; height: 700px;-->
                <div style="float: left; border:1px solid #000000; margin-right: 1px;">
                    <div style="float: left; text-align: center; margin-right: 10px; font-size: x-small; background-color: #62ACF5;">
                        Citas Registradas<br />Cabina <?php echo $this->Session->read('cabina'); ?>                        
                    </div>
                    <div style="float: left;">
                        <?php
                            echo $llamregstotalcab; 
                        ?>
                    </div>
                </div>
                <div style="float: left; border:1px solid #000000; margin-right: 1px;">
                    <div style="float: left; text-align: center; margin-right: 10px; font-size: x-small; background-color: #62ACF5;">
                        Citas Registradas<br /> por el/la operador(a)                           
                    </div>
                    <div style="float: left;">
                        <?php
                            echo $llamregstotaluser; 
                        ?>
                    </div>
                </div>
                <div style="float: left; border:1px solid #000000;">
                    <div style="float: left; text-align: center; margin-right: 10px; font-size: x-small; background-color: #62ACF5;  width: 220px;">
                       Citas Registradas Cabina <?php echo $this->Session->read('cabina'); ?><br />
                        por el/la operador(a)
                    </div>
                    <div style="float: left;">
                        <?php
                            echo $llamregscabuser; 
                        ?>
                    </div>
                </div>                                
            </div>
            
            <div style="margin-left: 5%; margin-top: 2%; width: 500px; float: bottom; text-align: center; font-size: small;">
                <!-- margin-left: 200px; width: 300px; height: 700px;  style="width: 300px; position: relative; top: 20%; left: 30%;"-->
                <h1 style="font-size: large;">Registrar Cita</h1>    
                               
                <?php 
                     echo $this->Form->create('RegLlamada');   
                ?>
                <?php
                    echo $this->Form->hidden('RegLlamada.turno',
                                                array(
                                                        'value'=>$this->Session->read('turno')
                                                        )
                                                ); 
                ?>
                <?php
                    echo $this->Form->hidden('RegLlamada.cabina',
                                                array(
                                                        'value'=>$this->Session->read('cabina')
                                                        )
                                                ); 
                ?>
                <?php
                     echo $this->Form->input('RegLlamada.dni_pac',
                                                array(
                                                        'label'=>'DNI',
                                                        'placeholder'=>'DNI',
                                                        'class'=> "input small"
                                                        )
                                                );
                ?>
                <?php
                     echo $this->Form->input('RegLlamada.aps_nombs',
                                                array(
                                                        'label'=>'Apellidos y Nombres',
                                                        'placeholder'=>'Apellidos y Nombres',
                                                        'class'=> "input medium"
                                                        )
                                                );
                ?>
                <?php
                     echo $this->Form->input('RegLlamada.telefono',
                                                array(
                                                        'label'=>'Telefono o Celular',
                                                        'placeholder'=>'Telefono o Celular',
                                                        'class'=> "input small"
                                                        )
                                                );
                ?>
                <label>
                    Centro Asistencial
                </label>
                <div id="divcas">
                    <select id="casid" name="data[RegLlamada][ca_id]">
    				    <option>Seleccione CAS</option>
    				    <?php
    					   foreach($cas as $ca):
    					      $id = $ca['Ca']['id'];
    		                  $nombre = $ca['Ca']['cas'];
    						  echo "<option value='$id'>$nombre</option>";
    				       endforeach;
    					?>
    				</select>
                    <?php
                        echo $this->Ajax->observeField('casid',
                                                array(
                                                        'url'=>array('action'=>'especialidades'),
                                                        'update'=>'divespecialidad'
                                                        ));
                    ?>
                </div>
               <label>
                    Especialidad
                </label>
                <div id="divespecialidad">
                    <select id="especialidadid" name="data[Especialidad]" disabled="true">
    				    <option>Seleccione Especialidad</option>    				    
    				</select>
                </div>
                <label>
                    Medico
                </label>
                <div id="divmedico">
                    <select id="medicoid" name="data[Medico]" disabled="true">
    				    <option>Seleccione Medico</option>    				    
    				</select>
                </div>
                
                
                <?php
                     echo $this->Form->input('RegLlamada.consultorio',
                                                array(
                                                        'label'=>'Consultorio',
                                                        'placeholder'=>'Consultorio',
                                                        'class'=> "input small"
                                                        )
                                                );
                ?>
                <?php
                     echo $this->Form->input('RegLlamada.acto_medico',
                                                array(
                                                        'label'=>'Acto Medico',
                                                        'placeholder'=>'Acto Medico',
                                                        //'class'=> "span9"
                                                        )
                                                );
                ?>
                
                <p>
                <label>
                    Fecha Cita
                </label>
                <?php
                     echo $this->Form->dateTime('RegLlamada.fecha_cita',
                                                'YMD',
                                                '24',
                                                array('empty'=>null,
                                                        'monthNames'=>array(null,
                                                                            'Enero',
                                                                            'Febrero',
                                                                            'Marzo',
                                                                            'Abril',
                                                                            'Mayo',
                                                                            'Junio',
                                                                            'Julio',
                                                                            'Agosto',
                                                                            'Setiembre',
                                                                            'Octubre',
                                                                            'Noviembre',
                                                                            'Diciembre'
                                                                            ),
                                                        'minYear'=>date('Y'),
                                                        'maxYear'=>date('Y')+1,
                                                        'value'=>date('Y-m-d 12:00:00', strtotime("+1 day"))
                                                        //'label'=>'Fecha Cita'
                                                        )
                                                
                                                );
                ?>
                </p>
                <p>
                    <label>Cita Otorgada</label>
                    <?php       
                         echo $this->Form->select('RegLlamada.cita_otorgada',
                                                    array('si'=>'Si','no'=>'No'),
                                                    array('empty'=>false,'value'=>'si')
                                                    );
                                                    
                    ?>
                </p>                
                <p>
                    <label>
                        Observacion de la Cita
                    </label>
                    <select id="obs" name="data[RegLlamada][llamada_observ_id]">
        			    <option>Seleccione Observacion</option>
                        <?php
        				    foreach($observaciones as $observacion):
					            $id = $observacion['LlamadaObserv']['id'];
        		                $nombre = $observacion['LlamadaObserv']['observacion'];
        					   
                                if($id == 1){
                                    echo "<option value='$id' selected>$nombre</option>";
                                }else{
                                    echo "<option value='$id'>$nombre</option>";   
                                }   
    	                    endforeach;
    				    ?>
    				</select>
                </p>
                <p>   
                    <label>
                        Relacion Familiar
                    </label>
                    <select id="rel_fam" name="data[RegLlamada][rel_familiar_id]">
        			    <option>Seleccione Relacion</option>
                        <?php
        				    foreach($relfamiliares as $relfamiliar):
        					   $id = $relfamiliar['RelFamiliar']['id'];
        		               $nombre = $relfamiliar['RelFamiliar']['relacion'];
        					   if($id == 1){
                                    echo "<option value='$id' selected>$nombre</option>";
                                }else{
                                    echo "<option value='$id'>$nombre</option>";   
                                }
    	                    endforeach;
    				    ?>
    				</select>
                </p>             
                
                <?php
                    echo $this->Form->hidden('RegLlamada.user_id',
                                                array(
                                                        'value'=>$current_user['id']
                                                        )
                                                ); 
                ?>
                <?php
                    echo $this->Form->hidden('RegLlamada.user_mod',
                                                array(
                                                        'value'=>$current_user['id']
                                                        )
                                                );
                ?>                
                <?php
                    echo $this->Form->end('Registrar Llamada') 
                ?>
            </div>
        