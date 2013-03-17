<?php
    class Cabina extends AppModel{
        public $name = 'Cabina';
        
        public $hasMany = array('RegLlamada','ConfLlamada','ElimLlamada','Historial');
        public $belongsTo = array('User');
    }
?>