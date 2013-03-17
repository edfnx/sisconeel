<?php
    class Feriado extends AppModel{
        public $name = 'Feriado';
        
        //public $hasMany = array('RegLlamada');
        public $belongsTo = array('User');
    }
?>