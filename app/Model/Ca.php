<?php
    class Ca extends AppModel{
        public $name = 'Ca';
        
        public $hasMany = array('RegLlamada','Medico');
        public $belongsTo = array('User');
    }
?>