<?php $this->set('title_for_layout','Listado de Citas Registradas por el operador'); ?>

<div style="margin: 15px auto 15px auto;">
    <?php if(empty($llamregstotalusers)){ ?>
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
                     
                    foreach ($llamregstotalusers as $llamregstotaluser): ?>
                    <tr style="font-size: x-small;">
                        <td><?php   echo $i; ?></td>
                        <td><?php   echo $llamregstotaluser['RegLlamada']['turno']; ?></td>
                        <td><?php   echo $llamregstotaluser['RegLlamada']['cabina']; ?></td>
                        <td><?php   echo $llamregstotaluser['RegLlamada']['dni_pac']; ?></td>
                        <td><?php   echo $llamregstotaluser['Ca']['cas']; ?></td>
                        <td><?php   echo $llamregstotaluser['Medico']['espec']; ?></td>
                        <td><?php   echo $llamregstotaluser['RegLlamada']['fecha_cita']; ?></td>
                        <td><?php   echo $llamregstotaluser['RegLlamada']['cita_otorgada']; ?></td>
                        <td>
                            <?php                                    
                                if($llamregstotaluser['RegLlamada']['estado']=='conf'){
                                    echo "Confirmada";
                                }else if($llamregstotaluser['RegLlamada']['estado']=='elim'){
                                    echo "Eliminada";
                                }else{
                                    echo "Stand by";
                                }
                            ?>
                        </td>
                        <td><?php   echo $llamregstotaluser['RegLlamada']['created']; ?></td>                                                                            
                    </tr>                                                
                <?php 
                    $i=$i+1;
                        
                    endforeach; 
                ?>
            </tbody>            
        </table>
    <?php } ?>

</div>