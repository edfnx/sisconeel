<?php $this->set('title_for_layout','Listado de Citas Otorgadas por el operador'); ?>

<div style="margin: 15px auto 15px auto;">
    <?php if(empty($llamotorgtotalusers)){ ?>
        No ha Registrado Ninguna Cita
    <?php } else { ?>
        <table>
            <thead>
                <tr style="font-size: x-small;">
                    <th>Num</th>
                    <th>Turno</th>
                    <th>Cabina</th>
                    <th>DNI Pac</th>
                    <th>CAS</th>
                    <th>Especialidad</th>
                    <th>Fecha Cita</th>
                    <th>Cita Otorgada</th>
                    <th>Estado</th>
                    <th>Creacion</th>                                                                                                                    
                </tr>
            </thead>
            <tbody>                                                                                       
                <?php
                    $i=1;
                     
                    foreach ($llamotorgtotalusers as $llamotorgtotaluser): ?>
                    <tr style="font-size: x-small;">
                        <td><?php   echo $i; ?></td>
                        <td>
                            <?php   
                                if($llamotorgtotaluser['RegLlamada']['turno']=="manana"){
                                    echo "Ma&ntilde;ana";
                                }else if($llamotorgtotaluser['RegLlamada']['turno']=="tarde"){
                                    echo "Tarde";
                                }else{
                                    echo "Apoyo";
                                } 
                            ?>                        
                        </td>
                        <td><?php   echo $llamotorgtotaluser['RegLlamada']['cabina']; ?></td>
                        <td><?php   echo $llamotorgtotaluser['RegLlamada']['dni_pac']; ?></td>
                        <td><?php   echo $llamotorgtotaluser['Ca']['cas']; ?></td>
                        <td><?php   echo $llamotorgtotaluser['Medico']['espec']; ?></td>
                        <td><?php   echo $llamotorgtotaluser['RegLlamada']['fecha_cita']; ?></td>
                        <td><?php   echo $llamotorgtotaluser['RegLlamada']['cita_otorgada']; ?></td>
                        <td>
                            <?php                                    
                                if($llamotorgtotaluser['RegLlamada']['estado']=='conf'){
                                    echo "Confirmada";
                                }else if($llamotorgtotaluser['RegLlamada']['estado']=='elim'){
                                    echo "Eliminada";
                                }else{
                                    echo "Stand by";
                                }
                            ?>
                        </td>
                        <td><?php   echo $llamotorgtotaluser['RegLlamada']['created']; ?></td>                                                                            
                    </tr>                                                
                <?php 
                    $i=$i+1;
                        
                    endforeach; 
                ?>
            </tbody>            
        </table>
    <?php } ?>

</div>