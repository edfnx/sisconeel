<?php
    class RegLlamada extends AppModel{
        public $name = 'RegLlamada';
        
        public $hasMany = array('ConfLlamada','ElimLlamada');
        public $belongsTo = array('Ca','Medico','LlamadaObserv','RelFamiliar','User');
    }
?>