<?php $this->set('title_for_layout','Registrar Usuario'); ?>
<div style="margin: 15px auto 15px auto; text-align: left;">
    <?php echo $this->html->link('Ver Usuarios', array('action'=>'index'),array('class' => 'button medium blue')); ?>
</div>
<div style="margin-left: 5%; margin-top: 2%; width: 300px; float: bottom; text-align: center; font-size: small;">
    <!-- margin-left: 200px; width: 300px; height: 700px;-->
    <div style="text-align: center;">        
        <h1 style="font-size:  small;">Agregar Usuario</h1>    
    </div>    
    <?php 
         echo $this->Form->create('User');   
    ?>
    <?php
         echo $this->Form->input('User.username',
                                    array(
                                            'label'=>'Usuario',
                                            'placeholder'=>'Usuario',
                                            //'class'=> "span9"
                                            )
                                    );
    ?>
    <?php
         echo $this->Form->input('User.password',
                                    array(
                                            'label'=>'Password',
                                            'placeholder'=>'Password',
                                            //'class'=> "span9"
                                            )
                                    );
    ?>
    <label>Nivel de Seguridad</label>
    <?php       
         echo $this->Form->select('User.role',
                                    array('admin'=>'Administrador','super'=>'Supervisor','oper'=>'Operador'),
                                    array('empty'=>'Nivel de Seguridad','value'=>'oper')
                                    );
                                    
    ?>
    <?php
         echo $this->Form->input('User.nombres',
                                    array(
                                            'label'=>'Nombres',
                                            'placeholder'=>'Nombres',
                                            //'class'=> "span9"
                                            )
                                    );
    ?>
    <?php
         echo $this->Form->input('User.ap_paterno',
                                    array(
                                            'label'=>'Apellido Paterno',
                                            'placeholder'=>'Apellido Paterno',
                                            //'class'=> "span9"
                                            )
                                    );
    ?>
    <?php
         echo $this->Form->input('User.ap_materno',
                                    array(
                                            'label'=>'Apellido Materno',
                                            'placeholder'=>'Apellido Materno',
                                            //'class'=> "span9"
                                            )
                                    );
    ?>
    <?php
         echo $this->Form->input('User.dni',
                                    array(
                                            'label'=>'DNI',
                                            'placeholder'=>'DNI',
                                            //'class'=> "span9"
                                            )
                                    );
    ?>
    <p>
        <label>Turno</label>
        <?php       
             echo $this->Form->select('User.turno',
                                        array('manana'=>'Manana','tarde'=>'Tarde'),
                                        array('empty'=>'Turno','value'=>'manana')
                                        );
                                        
        ?>
    </p>    
    <?php
         echo $this->Form->input('User.observaciones',
                                    array(
                                            'label'=>'Observaciones',
                                            'placeholder'=>'Observaciones',
                                            //'class'=> "span9"
                                            )
                                    );
    ?>
    <?php
        echo $this->Form->hidden('User.user_id_c',
                                    array(
                                            'value'=>$current_user['id']
                                            )
                                    ); 
    ?>
    <?php
        echo $this->Form->hidden('User.user_mod',
                                    array(
                                            'value'=>$current_user['id']
                                            )
                                    ); 
    ?>
    <?php
        echo $this->Form->end('Registrar Usuario') 
    ?>
</div>