<?php $this->set('title_for_layout','Confirmacion de Acceso'); ?>
<div class="row">
    <div class="span6 offset3">
        <div class="page-header">        
            <h4>Verificacion de Identidad</h4>    
        </div>
        
            <?php echo $this->BtForm->create(); ?>
                <?php echo $this->Form->hidden('Historial.user_id',array('value'=>$current_user['id'])); ?>
                <?php echo $this->Form->hidden('Historial.role',array('value'=>$current_user['role'])); ?>    
         
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
                <?php
                        $fecha_actual = strtotime(date("Y-m-d H:i:00"));
                        
                        $fecha_dia = strtotime(date("Y-m-d 06:00:00"));
                        
                        $fecha_tarde  = strtotime(date("Y-m-d 14:00:00"));
                        
                        $fecha_noche = strtotime(date("Y-m-d 22:00:00"));
                        
                        if($fecha_actual > $fecha_dia && $fecha_actual < $fecha_tarde){
                            $turno = "manana";
                        }else if($fecha_actual > $fecha_tarde && $fecha_actual < $fecha_noche){
                            $turno = "tarde";
                        }else{
                            $turno = "apoyo";
                        }
                ?>
                
                Estas ingresando 
                <h1 style="font-size: medium;">
                    <?php 
                        if($current_user['turno'] == $turno){
                            if($current_user['turno']=="manana"){
                                echo "en el Turno<br />Ma&ntilde;ana";
                            }else if($current_user['turno']=="tarde"){
                                echo "en el Turno<br />Tarde"; 
                            }else{
                                echo "como Personal de Apoyo";
                            }                   
                        }else {
                            echo "como Personal de Apoyo";      
                        }               
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