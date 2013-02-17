<?php
    class Medico extends AppModel{
        public $name = 'Medico';
        
        public $hasMany = array('RegLlamada');
        public $belongsTo = array('User','Ca','Especialidade');
    }
?>