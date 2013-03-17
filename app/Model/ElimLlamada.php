<?php
    class ElimLlamada extends AppModel{
        public $name = 'ElimLlamada';
        
        //public $hasMany = array('RegLlamada');
        public $belongsTo = array('RegLlamada','RelFamiliar','User','Cabina');
    }
?>