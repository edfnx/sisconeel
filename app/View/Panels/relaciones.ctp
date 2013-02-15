<?php $this->set('title_for_layout','Relaciones Familiares'); ?>
<div style="margin: 15px auto 15px auto; text-align: left;">
    <?php echo $this->html->link('Agregar Relacion', array('action'=>'add_relaciones'),array('class' => 'button medium blue')); ?>
</div>
<div style="margin: 15px auto 15px auto;">
    <?php if(empty($relaciones)){ ?>
        No hay Relaciones Familiares Registradas
    <?php } else { ?>
        <table>
            <thead>
                <tr style="font-size: x-small;">
                    <th>Id</th>
                    <th>Relacion</th>
                    <th>Creado</th>
                    <th>Usuario</th>
                    <th>Actualizado</th>
                    <th>Usuario</th>
                    <th>Accion</th>                                                                                                
                </tr>
            </thead>
            <tbody>                                                                                       
                <?php foreach ($relaciones as $relacion): ?>
                    <tr style="font-size: x-small;">
                        <td><?php   echo $relacion['RelFamiliar']['id']; ?></td>
                        <td><?php   echo $relacion['RelFamiliar']['relacion']; ?></td>
                        <td><?php   echo $relacion['RelFamiliar']['created']; ?></td>
                        <td><?php   echo $relacion['User']['nombres']." ".$relacion['User']['ap_paterno']." ".$relacion['User']['ap_materno']; ?></td>
                        <td><?php   echo $relacion['RelFamiliar']['modified']; ?></td>
                        <td><?php   echo $relacion['RelFamiliar']['user_mod']; ?></td>
                        <td>
                            <?php echo $this->html->link('Editar', array('action'=>'edit_relaciones',$relacion['RelFamiliar']['id']),array('class' => 'button medium blue')); ?>                                                        
                        </td>                                                    
                    </tr>                                                
                <?php endforeach; ?>
            </tbody>            
        </table>
    <?php } ?>
</div>