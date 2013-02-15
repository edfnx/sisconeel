<?php $this->set('title_for_layout','Respuestas para las llamadas'); ?>
<div style="margin: 15px auto 15px auto; text-align: left;">
    <?php echo $this->html->link('Agregar Respuesta', array('action'=>'add_respuestas'),array('class' => 'button medium blue')); ?>
</div>
<div style="margin: 15px auto 15px auto;">
    <?php if(empty($respuestas)){ ?>
        No hay Observaciones Registrados
    <?php } else { ?>
        <table>
            <thead>
                <tr style="font-size: x-small;">
                    <th>Id</th>
                    <th>Respuesta</th>
                    <th>Creado</th>
                    <th>Usuario</th>
                    <th>Actualizado</th>
                    <th>Usuario</th>
                    <th>Accion</th>                                                                                                
                </tr>
            </thead>
            <tbody>                                                                                       
                <?php foreach ($respuestas as $respuesta): ?>
                    <tr style="font-size: x-small;">
                        <td><?php   echo $respuesta['Respuesta']['id']; ?></td>
                        <td><?php   echo $respuesta['Respuesta']['respuesta']; ?></td>
                        <td><?php   echo $respuesta['Respuesta']['created']; ?></td>
                        <td><?php   echo $respuesta['User']['nombres']." ".$respuesta['User']['ap_paterno']." ".$respuesta['User']['ap_materno']; ?></td>
                        <td><?php   echo $respuesta['Respuesta']['modified']; ?></td>
                        <td><?php   echo $respuesta['Respuesta']['user_mod']; ?></td>
                        <td>
                            <?php echo $this->html->link('Editar', array('action'=>'edit_respuestas',$respuesta['Respuesta']['id']),array('class' => 'button medium blue')); ?>                                                        
                        </td>                                                    
                    </tr>                                                
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } ?>

</div>