<?php
    class RelFamiliar extends AppModel{
        public $name = 'RelFamiliar';
        
        public $hasMany = array('RegLlamada','ConfLlamada','ElimLlamada');
        public $belongsTo = array('User');
    }
?>