<?php $this->set('title_for_layout','Control de Acceso'); ?>

<div class="row">
    <div class="span6 offset3">
        <div class="page-header">        
            <h4>Iniciar sesión</h4>    
        </div>
        
        <?php echo $this->BtForm->create(); ?>
        <?php echo $this->BtForm->input('username', 'Usuario',
                                        array(
                                                'placeholder'=>'Ingrese su Usuario',
                                                'required'=>'required'
                                                )
                                        );
        ?>
        <?php echo $this->BtForm->input('password', 'Password',
                                        array(
                                                'placeholder'=>'Ingrese su Password',
                                                'required'=>'required'
                                                )
                                        );
        ?>
        <?php echo $this->BtForm->input('cabina', 'Numero de Cabina',
                                        array(
                                                'placeholder'=>'Numero de Cabina',
                                                'required'=>'required'
                                                )
                                        );
        ?>
        <?php echo $this->BtForm->submit('Ingresar'); ?>
                    
        <?php echo $this->Form->end() ?>
        
    </div>
</div>