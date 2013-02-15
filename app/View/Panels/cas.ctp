<?php $this->set('title_for_layout','Centros Asistenciales de Salud Registrados'); ?>
<div style="margin: 15px auto 15px auto; text-align: left;">
    <?php echo $this->html->link('Agregar CAS', array('action'=>'add_cas'),array('class' => 'button medium blue')); ?>
</div>
<div>
    <?php if(empty($cas)){ ?>
        No hay Centros Asistenciales Registrados
    <?php } else { ?>
        <table class="responsive dynamicTable display table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Codigo</th>
                    <th>CAS</th>
                    <th>Creado</th>
                    <th>Usuario</th>
                    <th>Actualizado</th>
                    <th>Usuario</th>
                    <th>Accion</th>                                                                                                
                </tr>
            </thead>
            <tbody>                                                                                       
                <?php foreach ($cas as $ca): ?>
                    <tr>
                        <td><?php   echo $ca['Ca']['id']; ?></td>
                        <td><?php   echo $ca['Ca']['code']; ?></td>
                        <td><?php   echo $ca['Ca']['cas']; ?></td>
                        <td><?php   echo $ca['Ca']['created']; ?></td>
                        <td><?php   echo $ca['User']['nombres']." ".$ca['User']['ap_paterno']." ".$ca['User']['ap_materno']; ?></td>
                        <td><?php   echo $ca['Ca']['modified']; ?></td>
                        <td><?php   echo $ca['Ca']['user_mod']; ?></td>
                        <td>
                            <?php echo $this->html->link('Editar', array('action'=>'edit_cas',$ca['Ca']['id']),array('class' => 'button medium blue')); ?>                                                        
                        </td>                                                    
                    </tr>                                                
                <?php endforeach; ?>
            </tbody>            
        </table>
    <?php } ?>

</div>