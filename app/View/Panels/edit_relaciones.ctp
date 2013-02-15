<?php $this->set('title_for_layout','Actualizar Relacion Familiar'); ?>
<div style="margin: 15px auto 15px auto; text-align: left;">
    <?php echo $this->html->link('Ver Relaciones', array('action'=>'relaciones'),array('class' => 'button medium blue')); ?>
</div>
<div style="margin-left: 5%; margin-top: 2%; width: 400px; float: bottom; text-align: center; font-size: small;">
    <!-- margin-left: 200px; width: 300px; height: 700px;-->
    <div style="text-align: center;">        
        <h1 style="font-size:  small;">Actualizar Relacion Familiar</h1>    
    </div>
    
    <?php 
         echo $this->Form->create('Relacion');   
    ?>
    <?php
         echo $this->Form->input('RelFamiliar.relacion',
                                    array(
                                            'label'=>'Relacion Familiar',
                                            'placeholder'=>'Relacion Familiar',
                                            //'class'=> "span9"
                                            )
                                    );
    ?>
    <?php
        echo $this->Form->hidden('RelFamiliar.user_mod',
                                    array(
                                            'value'=>$current_user['id']
                                            )
                                    ); 
    ?>
    <?php
        echo $this->Form->end('Actualizar Relacion') 
    ?>
</div>