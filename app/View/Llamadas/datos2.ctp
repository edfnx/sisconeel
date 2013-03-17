<?php 
            
    foreach($datos as $dato);
    
    echo $this->Form->hidden('ElimLlamada.reg_llamada_id',
                                array(
                                        'value'=>$dato['RegLlamada']['id']
                                        )
                                );
                                    
    echo "Nombres: ".$dato['RegLlamada']['dni_pac']."<br />";
    echo "Datos Personales: ".$dato['RegLlamada']['aps_nombs']."<br />";
    echo "Telefono: ".$dato['RegLlamada']['telefono']."<br />";
    echo "CAS: ".$dato['Ca']['cas']."<br />";
    echo "Especialidad: ".$dato['Especialidade']['especialidad']."<br />";
    echo "Medico: ".$dato['Medico']['medico']."<br />";
    echo "Consultorio: ".$dato['RegLlamada']['consultorio']."<br />";
    echo "Acto Medico: ".$dato['RegLlamada']['acto_medico']."<br />";
    echo "Fecha Cita: ".$dato['RegLlamada']['fecha_cita']."<br />";
    
?>