<?php $this->set('title_for_layout','Confirmacion de Acceso'); ?>
<div class="row">
    <div class="span6 offset3">
        <div class="page-header">        
            <h4>Verificacion de Identidad</h4>    
        </div>
        
            <?php echo $this->BtForm->create(); ?>
                <?php echo $this->Form->hidden('Historial.user_id',array('value'=>$current_user['id'])); ?>
                <?php echo $this->Form->hidden('Historial.role',array('value'=>$current_user['role'])); ?>
                <?php echo $this->Form->hidden('Historial.turno',array('value'=>$current_user['turno'])); ?>
         
                <h1>
                    <?php 
                        echo $current_user['nombres']." ".$current_user['ap_paterno']." ".$current_user['ap_materno'];
                    ?>
                </h1>
                Tienes Acceso de<br />
                <h1 style="font-size: medium;">
                    <?php 
                        if($current_user['role']=='admin'){
                            echo "Administrador";
                        }else if($current_user['role']=='super'){
                            echo "Supervisor";
                        }else if($current_user['role']=='oper'){
                            echo "Operador";
                        }                
                    ?>
                </h1>
                
                Estas ingresando 
                <h1 style="font-size: medium;">
                    
                    <?php
                        
                        $turno = $this->Session->read('turno');
                        
                        echo $turno;            
                    ?>
                </h1>
                <?php
                    echo "Nro de Cabina<br />".$this->Session->read('cabina');;
                ?>
                
                <div class="form-actions">                    
                    <?php echo $this->Form->submit('Continuar', array('class' => 'btn btn-primary', 'div' => false)); ?>
                    <?php echo $this->Html->link("Salir", array('controller'=>'users', 'action'=>'logout'), array('class' => 'btn')); ?>
                </div>
            <?php echo $this->Form->end(); ?>
            
    
    </div>
</div>