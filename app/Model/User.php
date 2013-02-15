<?php
    class User extends AppModel{
        public $name = 'User';
        
        public $hasMany = array('Cas','LlamadaObserv','Medico','RegLlamada','Respuesta','ConfLlamada','ElimLlamada','Historial','RelFamiliar');
        //public $belongsTo = array();
        
        public function beforeSave(){
            if(isset($this->data['User']['password'])){
                $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
            }
            return true;
        }
        
    }
?>