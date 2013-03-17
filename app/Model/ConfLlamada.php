<?php
    class ConfLlamada extends AppModel{
        public $name = 'ConfLlamada';
        
        //public $hasMany = array();
        public $belongsTo = array('RegLlamada','Respuesta','RelFamiliar','User','Cabina');
    }
?>