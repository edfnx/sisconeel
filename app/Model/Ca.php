<?php
    class Ca extends AppModel{
        public $name = 'Ca';
        
        public $hasMany = array('RegLlamada','Medico','Especialidade');
        public $belongsTo = array('User');
    }
?>