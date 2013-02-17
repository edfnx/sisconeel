<?php $this->set('title_for_layout','Agregar Especialidades'); ?>
<div style="margin: 15px auto 15px auto; text-align: left;">
    <?php echo $this->html->link('Ver Especialidad', array('action'=>'especialidades'),array('class' => 'button medium blue')); ?>
</div>
<div style="margin-left: 5%; margin-top: 2%; width: 300px; float: bottom; text-align: center; font-size: small;">
    <!-- margin-left: 200px; width: 300px; height: 700px;-->
    <div style="text-align: center;">        
        <h1 style="font-size:  small;">Agregar Especialidad</h1>    
    </div>
    
    <?php 
         echo $this->Form->create('Especialidade');   
    ?>
    <?php echo $this->BtForm->input('Especialidade.ca_id', 'Cas',  array('empty' => 'Selecione Cas')); ?>
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
        echo $this->Form->hidden('Especialidade.user_id',
                                    array(
                                            'value'=>$current_user['id']
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
        echo $this->Form->end('Registrar Especialidad') 
    ?>
</div>