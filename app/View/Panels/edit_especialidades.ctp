<?php $this->set('title_for_layout','Editar Especialidad'); ?>
<div style="margin: 15px auto 15px auto; text-align: left;">
    <?php echo $this->html->link('Ver Especialidad', array('action'=>'especialidades'),array('class' => 'button medium blue')); ?>
</div>
<div style="margin-left: 5%; margin-top: 2%; width: 300px; float: bottom; text-align: center; font-size: small;">
    <!-- margin-left: 200px; width: 300px; height: 700px;-->
    <div style="text-align: center;">        
        <h1 style="font-size:  small;">Actualizar Especialidad</h1>    
    </div>
    
    <?php 
         echo $this->Form->create('Especialidade');   
    ?>
    <label>
        Centro Asistencial
    </label>
    <select id="casid" name="data[Especialidade][ca_id]">
	   <option>Seleccione CAS</option>
	   <?php
            foreach($cas as $ca):
			    $id = $ca['Ca']['id'];
				$nombre = $ca['Ca']['cas'];
                if($id == $datos['Especialidade']['ca_id']){
                    echo "<option value='$id' selected>$nombre</option>";
                }else{
				    echo "<option value='$id'>$nombre</option>";
                }
            endforeach;
	   ?>
    </select>
    <?php
         echo $this->Form->input('Especialidade.code',
                                    array(
                                            'label'=>'Codigo',
                                            'placeholder'=>'Codigo de CAS',
                                            //'class'=> "span9"
                                            )
                                    );
    ?>
    <?php
         echo $this->Form->input('Especialidade.especialidad',
                                    array(
                                            'label'=>'Especialidad',
                                            'placeholder'=>'Especialidad'
                                            )
                                    );
    ?>    
    <?php
        echo $this->Form->hidden('Especialidade.user_mod',
                                    array(
                                            'value'=>$current_user['id']
                                            )
                                    ); 
    ?>
    <?php
        echo $this->Form->end('Actualizar Especialidad') 
    ?>
</div>