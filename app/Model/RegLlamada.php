<?php
    class RegLlamada extends AppModel{
        public $name = 'RegLlamada';
        
        public $hasMany = array('ConfLlamada','ElimLlamada');
        public $belongsTo = array('Ca','Especialidade','Medico','LlamadaObserv','RelFamiliar','User');
    }
?>