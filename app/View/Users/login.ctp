<?php $this->set('title_for_layout','Control de Acceso'); ?>

<div style="width: 300px; position: relative; top: 20%; left: 40%; text-align: center;">
    <!-- margin-left: 200px; width: 300px; height: 700px;-->
    <div>        
        <h1 style="font-size:  small;">Ingrese Usuario y Contrase&ntilde;a</h1>    
    </div>
    
    <form></form>
    
    <?php 
         echo $this->Form->create('User');
    ?>
    <?php
         echo $this->Form->input('username',
                                    array(
                                            'label'=>'Usuario',
                                            'placeholder'=>'Ingrese su Usuario'
                                            )
                                    );
    ?>
    <?php
         echo $this->Form->input('password',
                                    array(
                                            'label'=>'Password',
                                            'placeholder'=>'Ingrese su Password'
                                            )
                                    );
    ?>
    <?php
         echo $this->Form->input('cabina',
                                    array(
                                            'label'=>'Numero de Cabina',
                                            'placeholder'=>'Numero de Cabina',
                                            'class'=>'input xsmall'
                                            )
                                    );
    ?>
    <?php
        echo $this->Form->end('Ingresar') 
    ?>
</div>