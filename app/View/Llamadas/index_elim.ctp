<?php $this->set('title_for_layout','Listado de Citas Eliminadas por el operador'); ?>

<div style="margin: 15px auto 15px auto;">
    <?php if(empty($llamelimtotalusers)){ ?>
        No ha Confirmado Ninguna Cita
    <?php } else { ?>
        <table>
            <thead>
                <tr style="font-size: x-small;">
                    <th>Num</th>
                    <th>Turno</th>
                    <th>Cabina</th>
                    <th>DNI Pac</th>
                    <th>Relacion</th>
                    <th>Observacion</th>                    
                    <th>Creacion</th>                                                                                                                    
                </tr>
            </thead>
            <tbody>                                                                                       
                <?php
                    $i=1;
                     
                    foreach ($llamelimtotalusers as $llamelimtotaluser): ?>
                    <tr style="font-size: x-small;">
                        <td><?php   echo $i; ?></td>
                        <td>
                            <?php   
                                if($llamelimtotaluser['ElimLlamada']['turno']=="manana"){
                                    echo "Ma&ntilde;ana";
                                }else if($llamelimtotaluser['ElimLlamada']['turno']=="tarde"){
                                    echo "Tarde";
                                }else{
                                    echo "Apoyo";
                                } 
                            ?>                        
                        </td>
                        <td><?php   echo $llamelimtotaluser['ElimLlamada']['cabina']; ?></td>
                        <td><?php   echo $llamelimtotaluser['RegLlamada']['dni_pac']; ?></td>
                        <td><?php   echo $llamelimtotaluser['RelFamiliar']['relacion']; ?></td>
                        <td>
                            <?php   
                                if($llamelimtotaluser['ElimLlamada']['observacion']==""){
                                    echo "Ninguna";
                                }else{
                                    echo $llamelimtotaluser['ElimLlamada']['observacion'];   
                                }
                            ?>
                        </td>
                        <td><?php   echo $llamelimtotaluser['ElimLlamada']['created']; ?></td>                                                                            
                    </tr>                                                
                <?php 
                    $i=$i+1;
                        
                    endforeach; 
                ?>
            </tbody>            
        </table>
    <?php } ?>

</div>