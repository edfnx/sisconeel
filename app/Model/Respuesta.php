<?php
    class Respuesta extends AppModel{
        public $name = 'Respuesta';
        
        public $hasMany = array('ConfLlamada');
        public $belongsTo = array('User');
    }
?>