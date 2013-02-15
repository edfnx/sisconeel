<?php $this->set('title_for_layout','Actulizar Observacion de Llamadas'); ?>
<div style="margin: 15px auto 15px auto; text-align: left;">
    <?php echo $this->html->link('Ver Observaciones', array('action'=>'observaciones'),array('class' => 'button medium blue')); ?>
</div>
<div style="margin-left: 5%; margin-top: 2%; width: 400px; float: bottom; text-align: center; font-size: small;">
    <!-- margin-left: 200px; width: 300px; height: 700px;-->
    <div style="text-align: center;">        
        <h1 style="font-size:  small;">Agregar Observacion</h1>    
    </div>
    
    <?php 
         echo $this->Form->create('Observacion');   
    ?>
    <?php
         echo $this->Form->input('LlamadaObserv.observacion',
                                    array(
                                            'label'=>'Observacion',
                                            'placeholder'=>'Observacion',
                                            //'class'=> "span9"
                                            )
                                    );
    ?>
    <?php
        echo $this->Form->hidden('LlamadaObserv.user_mod',
                                    array(
                                            'value'=>$current_user['id']
                                            )
                                    ); 
    ?>
    <?php
        echo $this->Form->end('Actualizar Observacion') 
    ?>
</div>