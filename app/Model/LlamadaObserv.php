<?php
    class LlamadaObserv extends AppModel{
        public $name = 'LlamadaObserv';
        
        public $hasMany = array('RegLlamada');
        public $belongsTo = array('User');
    }
?>