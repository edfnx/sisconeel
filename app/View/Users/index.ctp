<?php $this->set('title_for_layout','Usuarios Registrados'); ?>
<div style="margin: 15px auto 15px auto; text-align: left;">
    <?php echo $this->html->link('Agregar Usuario', array('action'=>'add'),array('class' => 'button medium blue')); ?>
</div>
<div style="margin: 15px auto 15px auto;">
    <?php if(empty($users)){ ?>
        No hay Usuarios Registrados
    <?php } else { ?>
        <table>
            <thead>
                <tr style="font-size: x-small;">
                    <th>Id</th>
                    <th>User</th>
                    <th>Password</th>
                    <th>Nivel</th>
                    <th>Nombres</th>
                    <th>Ap Paterno</th>
                    <th>Ap Materno</th>
                    <th>DNI</th>
                    <th>Turno</th>
                    <th>Observaciones</th>
                    <th>Creado</th>
                    <th>Usuario</th>
                    <th>Actualizado</th>
                    <th>Usuario</th>
                    <th>Accion</th>                                                                                                
                </tr>
            </thead>
            <tbody>                                                                                       
                <?php foreach ($users as $user): ?>
                    <tr style="font-size: x-small;">
                        <td><?php   echo $user['User']['id']; ?></td>
                        <td><?php   echo $user['User']['username']; ?></td>
                        <td><?php   echo "editar pass"?></td>
                        <td><?php   echo $user['User']['role']; ?></td>
                        <td><?php   echo $user['User']['nombres']; ?></td>
                        <td><?php   echo $user['User']['ap_paterno']; ?></td>
                        <td><?php   echo $user['User']['ap_materno']; ?></td>
                        <td><?php   echo $user['User']['dni']; ?></td>
                        <td>
                            <?php    
                                if($user['User']['turno']=='manana'){
                                    echo "Ma&ntilde;ana";
                                }else{
                                    echo "Tarde";
                                }
                            ?>                        
                        </td>
                        <td>
                            <?php    
                                if($user['User']['observaciones']==""){
                                    echo "Ninguna";
                                }else{
                                    echo $user['User']['observaciones'];
                                }
                            ?>                        
                        </td>
                        <td><?php   echo $user['User']['created']; ?></td>
                        <td><?php   echo $usercreated['User']['username']; ?></td>
                        <td><?php   echo $user['User']['modified']; ?></td>
                        <td><?php   echo $usermodified['User']['username']; ?></td>
                        <td>
                            <?php echo $this->html->link('Editar', array('action'=>'edit',$user['User']['id']),array('class' => 'button medium blue')); ?>                                                        
                        </td>                                                    
                    </tr>                                                
                <?php endforeach; ?>
            </tbody>            
        </table>
    <?php } ?>

</div>