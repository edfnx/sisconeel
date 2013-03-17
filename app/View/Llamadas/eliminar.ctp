<?php $this->set('title_for_layout','Eliminar Cita'); ?>

<div class="row">
    <div class="span10 offset1">
        <div class="row-fluid">
            <div class="span4">
                <div class="ss-boxit">
                    <div class="amount">
                        <?php echo $llamelimtotalcab;  ?>
                    </div>
                    Citas Eliminadas Cabina <?php echo $this->Session->read('num_cabina'); ?>                        
                </div>
            </div>
            <div class="span4">
                <div class="ss-boxit">
                    <div class="amount">
                        <?php echo $llamelimtotaluser; ?>
                    </div>
                        Citas Eliminadas por el/la operador(a)                           
                </div>
            </div>
            <div class="span4">
                <div class="ss-boxit">
                    <div class="amount">
                        <?php echo $llamelimcabuser; ?>
                    </div>                  
                       Citas Eliminadas Cabina <?php echo $this->Session->read('num_cabina'); ?> por el/la operador(a)
                </div>
            </div>
        </div>  
    </div>
</div>

<div class="page-header">
	
	<h2>Eliminar Llamada</h2>   
</div>
                 
<?php 
     echo $this->Form->create('ElimLlamada');   
?>
<?php
    echo $this->Form->hidden('ElimLlamada.turno',
                                array(
                                        'value'=>$this->Session->read('turno')
                                        )
                                ); 
?>
<?php
    echo $this->Form->hidden('ElimLlamada.cabina_id',
                                array(
                                        'value'=>$this->Session->read('id_cabina')
                                        )
                                ); 
?>                
<div id="divcas">
    
    <?php echo $this->BtForm->input('ElimLlamada.dni_pac', 'Ingrese DNI', array('required' => 'required')); ?>
    <?php
        echo $this->Ajax->observeField('ElimLlamadaDniPac',
                                array(
                                        'frequency'=>0,
                                        'url'=>array('action'=>'datos2'),
                                        'update'=>'divdatos',
                                        'before'=>'$("#divdatos").html("Cargando Datos...")'
                                        ));    
    							
    ?>
    
</div>
<label>
    Datos Personales
</label>
<div id="divdatos">
    
</div>
<br /> 
<?php
     echo $this->Form->input('ElimLlamada.datos_llamada',
                                array(
                                        'label'=>'Persona que contesto',
                                        'placeholder'=>'Nombres Apellidos del familiar',
                                        //'class'=> "span9"
                                        )
                                );
?>

<?php echo $this->BtForm->input('ElimLlamada.telefono', 'Telefono o Celular'); ?>


<label>
    Relacion Familiar
</label>
<select id="casid" name="data[ElimLlamada][rel_familiar_id]">
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
     echo $this->Form->input('ElimLlamada.observacion',
                                array(
                                        'label'=>'Observacion',
                                        'placeholder'=>'Observacion',
                                        //'class'=> "span9"
                                        )
                                );
?>                                
<?php
    echo $this->Form->hidden('ElimLlamada.user_id',
                                array(
                                        'value'=>$current_user['id']
                                        )
                                ); 
?>                
<?php
    echo $this->Form->end('Eliminar Llamada') 
?>
</div>
