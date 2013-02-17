<?php $this->set('title_for_layout','Especialidades Registradas'); ?>
<div style="margin: 15px auto 15px auto; text-align: left;">
    <?php echo $this->html->link('Agregar Especialidad', array('action'=>'add_especialidades'),array('class' => 'button medium blue')); ?>
</div>
<div>
    <?php if(empty($especialidades)){ ?>
        No hay Especialidades Registradas
    <?php } else { ?>
        <table class="responsive dynamicTable display table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>CAS</th>
                    <th>Codigo</th>
                    <th>Especialidad</th>
                    <th>Creado</th>
                    <th>Usuario</th>
                    <th>Actualizado</th>
                    <th>Usuario</th>
                    <th>Accion</th>                                                                                                
                </tr>
            </thead>
            <tbody>                                                                                       
                <?php foreach ($especialidades as $especialidad): ?>
                    <tr>
                        <td><?php   echo $especialidad['Especialidade']['id']; ?></td>
                        <td><?php   echo $especialidad['Ca']['cas']; ?></td>
                        <td><?php   echo $especialidad['Especialidade']['code']; ?></td>
                        <td><?php   echo $especialidad['Especialidade']['especialidad']; ?></td>
                        <td><?php   echo $especialidad['Especialidade']['created']; ?></td>
                        <td><?php   echo $especialidad['User']['nombres']." ".$especialidad['User']['ap_paterno']." ".$especialidad['User']['ap_materno']; ?></td>
                        <td><?php   echo $especialidad['Especialidade']['modified']; ?></td>
                        <td><?php   echo $especialidad['Especialidade']['user_mod']; ?></td>
                        <td>
                            <?php echo $this->html->link('Editar', array('action'=>'edit_especialidades',$especialidad['Especialidade']['id']),array('class' => 'button medium blue')); ?>                                                        
                        </td>                                                    
                    </tr>                                                
                <?php endforeach; ?>
            </tbody>            
        </table>
    <?php } ?>

</div>