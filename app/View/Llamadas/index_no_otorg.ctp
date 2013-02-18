<?php $this->set('title_for_layout','Listado de Citas No Otorgadas por el operador'); ?>

<div style="margin: 15px auto 15px auto;">
    <?php if(empty($llamnootortotalusers)){ ?>
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
                    <th>Creacion</th>                                                                                                                    
                </tr>
            </thead>
            <tbody>                                                                                       
                <?php
                    $i=1;
                     
                    foreach ($llamnootortotalusers as $llamnootortotaluser): ?>
                    <tr style="font-size: x-small;">
                        <td><?php   echo $i; ?></td>
                        <td>
                            <?php   
                                if($llamnootortotaluser['RegLlamada']['turno']=="manana"){
                                    echo "Ma&ntilde;ana";
                                }else if($llamnootortotaluser['RegLlamada']['turno']=="tarde"){
                                    echo "Tarde";
                                }else{
                                    echo "Apoyo";
                                } 
                            ?>                        
                        </td>
                        <td><?php   echo $llamnootortotaluser['RegLlamada']['cabina']; ?></td>
                        <td><?php   echo $llamnootortotaluser['RegLlamada']['dni_pac']; ?></td>
                        <td><?php   echo $llamnootortotaluser['Ca']['cas']; ?></td>
                        <td><?php   echo $llamnootortotaluser['Especialidade']['especialidad']; ?></td>
                        <td><?php   echo $llamnootortotaluser['RegLlamada']['fecha_cita']; ?></td>
                        <td><?php   echo $llamnootortotaluser['RegLlamada']['cita_otorgada']; ?></td>                        
                        <td><?php   echo $llamnootortotaluser['RegLlamada']['created']; ?></td>                                                                            
                    </tr>                                                
                <?php 
                    $i=$i+1;
                        
                    endforeach; 
                ?>
            </tbody>            
        </table>
    <?php } ?>

</div>