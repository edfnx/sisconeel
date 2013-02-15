<?php $this->set('title_for_layout','Agregar Respuesta de Llamadas'); ?>
<div style="margin: 15px auto 15px auto; text-align: left;">
    <?php echo $this->html->link('Ver Respuestas', array('action'=>'respuestas'),array('class' => 'button medium blue')); ?>
</div>
<div style="margin-left: 5%; margin-top: 2%; width: 400px; float: bottom; text-align: center; font-size: small;">
    <!-- margin-left: 200px; width: 300px; height: 700px;-->
    <div style="text-align: center;">        
        <h1 style="font-size:  small;">Agregar Observacion</h1>    
    </div>
    
    <?php 
         echo $this->Form->create('Respuesta');   
    ?>
    <?php
         echo $this->Form->input('Respuesta.respuesta',
                                    array(
                                            'label'=>'Respuesta',
                                            'placeholder'=>'Respuesta',
                                            //'class'=> "span9"
                                            )
                                    );
    ?>
    <?php
        echo $this->Form->hidden('Respuesta.user_id',
                                    array(
                                            'value'=>$current_user['id']
                                            )
                                    ); 
    ?>
    <?php
        echo $this->Form->hidden('Respuesta.user_mod',
                                    array(
                                            'value'=>$current_user['id']
                                            )
                                    ); 
    ?>
    <?php
        echo $this->Form->end('Registrar Respuesta') 
    ?>
</div>