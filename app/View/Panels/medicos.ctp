<?php $this->set('title_for_layout','Medicos Registrados'); ?>
<div style="margin: 15px auto 15px auto; text-align: left;">
    <?php echo $this->html->link('Agregar Medico', array('action'=>'add_medicos'),array('class' => 'button medium blue')); ?>
</div>
<div style="margin: 15px auto 15px auto;">
    <?php if(empty($medicos)){ ?>
        No hay Medicos Registrados
    <?php } else { ?>
        <table>
            <thead>
                <tr style="font-size: x-small;">
                    <th>Id</th>
                    <th>CAS</th>
                    <th>Especialidad</th>
                    <th>Medico</th>
                    <th>Creado</th>
                    <th>Usuario</th>
                    <th>Actualizado</th>
                    <th>Usuario</th>
                    <th>Accion</th>                                                                                                
                </tr>
            </thead>
            <tbody>                                                                                       
                <?php foreach ($medicos as $medico): ?>
                    <tr style="font-size: x-small;">
                        <td><?php   echo $medico['Medico']['id']; ?></td>
                        <td><?php   echo $medico['Ca']['cas']; ?></td>
                        <td><?php   echo $medico['Medico']['espec']; ?></td>
                        <td><?php   echo $medico['Medico']['medico']; ?></td>
                        <td><?php   echo $medico['Medico']['created']; ?></td>
                        <td><?php   echo $medico['User']['nombres']." ".$medico['User']['ap_paterno']." ".$medico['User']['ap_materno']; ?></td>
                        <td><?php   echo $medico['Medico']['modified']; ?></td>
                        <td><?php   echo $medico['Medico']['user_mod']; ?></td>
                        <td>
                            <?php echo $this->html->link('Editar', array('action'=>'edit_medicos',$medico['Medico']['id']),array('class' => 'button medium blue')); ?>                                                        
                        </td>                                                    
                    </tr>                                                
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } ?>

</div>