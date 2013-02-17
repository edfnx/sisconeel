<?php
    class Especialidade extends AppModel{
        public $name = 'Especialidade';
        
        public $hasMany = array('RegLlamada','Medico');
        public $belongsTo = array('User','Ca');
    }
?>