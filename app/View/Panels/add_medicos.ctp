<?php $this->set('title_for_layout','Registrar Medico'); ?>
<div style="margin: 15px auto 15px auto; text-align: left;">
    <?php echo $this->html->link('Ver Medicos', array('action'=>'medicos'),array('class' => 'button medium blue')); ?>
</div>
<div style="margin-left: 5%; margin-top: 2%; width: 400px; float: bottom; text-align: center; font-size: small;">
    <!-- margin-left: 200px; width: 300px; height: 700px;-->
    <div style="text-align: center;">        
        <h1 style="font-size:  small;">Agregar Medico</h1>    
    </div>
    
    <?php 
         echo $this->Form->create('Medico');   
    ?>
    <label>
        Centro Asistencial
    </label>
    <select id="casid" name="data[Medico][ca_id]">
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
         echo $this->Form->input('Medico.espec',
                                    array(
                                            'label'=>'Especialidad',
                                            'placeholder'=>'Especialidad',
                                            //'class'=> "span9"
                                            )
                                    );
    ?>
    <?php
         echo $this->Form->input('Medico.medico',
                                    array(
                                            'label'=>'Medico',
                                            'placeholder'=>'Especialidad',
                                            //'class'=> "span9"
                                            )
                                    );
    ?>
    <?php
        echo $this->Form->hidden('Medico.user_id',
                                    array(
                                            'value'=>$current_user['id']
                                            )
                                    ); 
    ?>
    <?php
        echo $this->Form->hidden('Medico.user_mod',
                                    array(
                                            'value'=>$current_user['id']
                                            )
                                    ); 
    ?>
    <?php
        echo $this->Form->end('Actualizar Medico') 
    ?>
</div>