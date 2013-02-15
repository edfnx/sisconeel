<?php $this->set('title_for_layout','Listado de Citas Confirmadas por el operador'); ?>

<div style="margin: 15px auto 15px auto;">
    <?php if(empty($llamconftotalusers)){ ?>
        No ha Confirmado Ninguna Cita
    <?php } else { ?>
        <table>
            <thead>
                <tr style="font-size: x-small;">
                    <th>Num</th>
                    <th>Turno</th>
                    <th>Cabina</th>
                    <th>DNI Pac</th>
                    <th>Respuesta</th>
                    <th>Observacion</th>                    
                    <th>Creacion</th>                                                                                                                    
                </tr>
            </thead>
            <tbody>                                                                                       
                <?php
                    $i=1;
                     
                    foreach ($llamconftotalusers as $llamconftotaluser): ?>
                    <tr style="font-size: x-small;">
                        <td><?php   echo $i; ?></td>
                        <td>
                            <?php   
                                if($llamconftotaluser['ConfLlamada']['turno']=="manana"){
                                    echo "Ma&ntilde;ana";
                                }else if($llamconftotaluser['ConfLlamada']['turno']=="tarde"){
                                    echo "Tarde";
                                }else{
                                    echo "Apoyo";
                                } 
                            ?>                        
                        </td>
                        <td><?php   echo $llamconftotaluser['ConfLlamada']['cabina']; ?></td>
                        <td><?php   echo $llamconftotaluser['RegLlamada']['dni_pac']; ?></td>
                        <td><?php   echo $llamconftotaluser['Respuesta']['respuesta']; ?></td>
                        <td>
                            <?php   
                                if($llamconftotaluser['ConfLlamada']['observacion']==""){
                                    echo "Ninguna";
                                }else{
                                    echo $llamconftotaluser['ConfLlamada']['observacion'];   
                                }
                            ?>
                        </td>
                        <td><?php   echo $llamconftotaluser['ConfLlamada']['created']; ?></td>                                                                            
                    </tr>                                                
                <?php 
                    $i=$i+1;
                        
                    endforeach; 
                ?>
            </tbody>            
        </table>
    <?php } ?>

</div>