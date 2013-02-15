<?php $this->set('title_for_layout','Editar Centro Asistencial de Salud'); ?>
<div style="margin: 15px auto 15px auto; text-align: left;">
    <?php echo $this->html->link('Ver CAS', array('action'=>'cas'),array('class' => 'button medium blue')); ?>
</div>
<div style="margin-left: 5%; margin-top: 2%; width: 300px; float: bottom; text-align: center; font-size: small;">
    <!-- margin-left: 200px; width: 300px; height: 700px;-->
    <div style="text-align: center;">        
        <h1 style="font-size:  small;">Actualizar CAS</h1>    
    </div>
    
    <?php 
         echo $this->Form->create('Ca');   
    ?>
    <?php
         echo $this->Form->input('Ca.code',
                                    array(
                                            'label'=>'Codigo',
                                            'placeholder'=>'Codigo de CAS',
                                            //'class'=> "span9"
                                            )
                                    );
    ?>
    <?php
         echo $this->Form->input('Ca.cas',
                                    array(
                                            'label'=>'Centro Asistencial',
                                            'placeholder'=>'Centro Asistencial'
                                            )
                                    );
    ?>    
    <?php
        echo $this->Form->hidden('Ca.user_mod',
                                    array(
                                            'value'=>$current_user['id']
                                            )
                                    ); 
    ?>
    <?php
        echo $this->Form->end('Actualizar CAS') 
    ?>
</div>