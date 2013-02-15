<?php
    class Historial extends AppModel{
        public $name = 'Historial';
        
        //public $hasMany = array('RegLlamada');
        public $belongsTo = array('User');
    }
?>