<?php 
    echo $this->BtForm->input('ConfLlamada.reg_llamada_id', 'Cita por DNI',  array('empty' => 'DNI por Especialidad'));
    echo $this->Ajax->observeField('ConfLlamadaRegLlamadaId', array('url'=>array('action'=>'datos'), 'update'=>'divdatos')); 
?>