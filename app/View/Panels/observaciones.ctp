<?php $this->set('title_for_layout','Observaciones en las llamadas'); ?>
<div style="margin: 15px auto 15px auto; text-align: left;">
    <?php echo $this->html->link('Agregar Observacion', array('action'=>'add_observaciones'),array('class' => 'button medium blue')); ?>
</div>
<div style="margin: 15px auto 15px auto;">
    <?php if(empty($observaciones)){ ?>
        No hay Observaciones Registrados
    <?php } else { ?>
        <table>
            <thead>
                <tr style="font-size: x-small;">
                    <th>Id</th>
                    <th>Observacion</th>
                    <th>Creado</th>
                    <th>Usuario</th>
                    <th>Actualizado</th>
                    <th>Usuario</th>
                    <th>Accion</th>                                                                                                
                </tr>
            </thead>
            <tbody>                                                                                       
                <?php foreach ($observaciones as $observacion): ?>
                    <tr style="font-size: x-small;">
                        <td><?php   echo $observacion['LlamadaObserv']['id']; ?></td>
                        <td><?php   echo $observacion['LlamadaObserv']['observacion']; ?></td>
                        <td><?php   echo $observacion['LlamadaObserv']['created']; ?></td>
                        <td><?php   echo $observacion['User']['nombres']." ".$observacion['User']['ap_paterno']." ".$observacion['User']['ap_materno']; ?></td>
                        <td><?php   echo $observacion['LlamadaObserv']['modified']; ?></td>
                        <td><?php   echo $observacion['LlamadaObserv']['user_mod']; ?></td>
                        <td>
                            <?php echo $this->html->link('Editar', array('action'=>'edit_observaciones',$observacion['LlamadaObserv']['id']),array('class' => 'button medium blue')); ?>                                                        
                        </td>                                                    
                    </tr>                                                
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } ?>

</div>