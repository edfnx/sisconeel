<?php 

    class PanelsController extends AppController {
        public $helpers = array('Html', 'Form');
        var $name='Panels';        
        var $uses=array('Ca','Especialidade','Medico','LlamadaObserv','Respuesta','RelFamiliar','User');
        
        
        public function index(){
            
        }
        
        public function cas(){
            $this->set('cas',$this->Ca->find('all', array('recursive'=>0)));
        }
        
        public function add_cas(){
            if($this->request->is('post')) {
                if($this->Ca->save($this->request->data)) {
                   $this->Session->setFlash('Centro Asistencial Registrado');
                   $this->redirect(array('action'=>'cas'), null, true);
                } else {
                    $this->Session->setFlash('Ha ocurrido un error, Intente de Nuevo');
                }
            }
        }
        
        public function edit_cas($id=null){
            $this->Ca->id = $id;
            $this->Ca->recursive = 0;
            
            if($this->request->is('get')) {
                $this->request->data = $this->Ca->read();
            } else {
                    //$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
                if ($this->Ca->save($this->request->data)) {
                    $this->Session->setFlash('El CAS se ha Actualizado Correctamente');
                    $this->redirect(array('action' => 'cas'));
                } else {
                    $this->Session->setFlash('No se pudo Actualizar, Intente de Nuevo');
                } 
            }
        }
        
        public function especialidades(){
            $this->set('especialidades',$this->Especialidade->find('all', array('recursive'=>0)));
        }
        
        public function add_especialidades(){
            
            $this->set('cas',$this->Ca->find('list',array('fields'=>array('Ca.id','Ca.cas'))));
            
            if($this->request->is('post')) {
                if($this->Especialidade->save($this->request->data)) {
                   $this->Session->setFlash('Especialidad Registrada');
                   $this->redirect(array('action'=>'especialidades'), null, true);
                } else {
                    $this->Session->setFlash('Ha ocurrido un error, Intente de Nuevo');
                }
            }
        }
        
        public function edit_especialidades($id=null){
            $this->Especialidade->id = $id;
            $this->Especialidade->recursive = 0;
            
            $this->set('cas',$this->Ca->find('all',array('fields'=>array('Ca.id','Ca.cas'),'recursive'=>0)));
            
            if($this->request->is('get')) {
                $dato = $this->Especialidade->read();
                $this->set('datos',$dato);
                $this->request->data = $dato;
            } else {
                    //$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
                if ($this->Especialidade->save($this->request->data)) {
                    $this->Session->setFlash('El CAS se ha Actualizado Correctamente');
                    $this->redirect(array('action' => 'cas'));
                } else {
                    $this->Session->setFlash('No se pudo Actualizar, Intente de Nuevo');
                } 
            }
        }
        
        public function medicos(){
            $this->set('medicos',$this->Medico->find('all', array('recursive'=>0)));
        }
        
        public function add_medicos(){
            
            $this->set('cas',$this->Ca->find('list',array('fields'=>array('Ca.id','Ca.cas'))));
            
            $this->set('especialidades',$this->Especialidade->find('list',array('fields'=>array('Especialidade.id','Especialidade.especialidad'))));
                        
            if($this->request->is('post')) {
                if($this->Medico->save($this->request->data)) {
                   $this->Session->setFlash('Medico Registrado');
                   $this->redirect(array('action'=>'medicos'), null, true);
                } else {
                    $this->Session->setFlash('Ha ocurrido un error, Intente de Nuevo');
                }
            }
        }
        
        public function edit_medicos($id=null){
            $this->Medico->id = $id;
            $this->Medico->recursive = 0;
            
            $this->set('cas',$this->Ca->find('all',array('fields'=>array('Ca.id','Ca.cas'),'recursive'=>0)));
            
            $this->set('especialidades',$this->Especialidade->find('all',array('fields'=>array('Especialidade.id','Especialidade.especialidad'))));
            
            if($this->request->is('get')) {
                $dato = $this->Medico->read();
                $this->set('datos',$dato);
                $this->request->data = $dato;
            } else {
                    //$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
                if ($this->Medico->save($this->request->data)) {
                    $this->Session->setFlash('El Medico se ha Actualizado Correctamente');
                    $this->redirect(array('action' => 'medicos'));
                } else {
                    $this->Session->setFlash('No se pudo Actualizar, Intente de Nuevo');
                } 
            }
        }
        
        public function observaciones(){
            $this->set('observaciones',$this->LlamadaObserv->find('all', array('recursive'=>0)));
        }
        
        public function add_observaciones(){
            if($this->request->is('post')) {
                if($this->LlamadaObserv->save($this->request->data)) {
                   $this->Session->setFlash('Observacion de Llamada Registrada');
                   $this->redirect(array('action'=>'observaciones'), null, true);
                } else {
                    $this->Session->setFlash('Ha ocurrido un error, Intente de Nuevo');
                }
            }
        }
        
        public function edit_observaciones($id=null){
            $this->LlamadaObserv->id = $id;
            $this->LlamadaObserv->recursive = 0;
            
            if($this->request->is('get')) {
                $this->request->data = $this->LlamadaObserv->read();
            } else {
                    //$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
                if ($this->LlamadaObserv->save($this->request->data)) {
                    $this->Session->setFlash('La Observacion de llamada se ha Actualizado Correctamente');
                    $this->redirect(array('action' => 'observaciones'));
                } else {
                    $this->Session->setFlash('No se pudo Actualizar, Intente de Nuevo');
                } 
            }
        }
        
        public function respuestas(){
            $this->set('respuestas',$this->Respuesta->find('all', array('recursive'=>0)));
        }
        
        public function add_respuestas(){
            if($this->request->is('post')) {
                if($this->Respuesta->save($this->request->data)) {
                   $this->Session->setFlash('Respuesta de Llamada Registrada');
                   $this->redirect(array('action'=>'respuestas'), null, true);
                } else {
                    $this->Session->setFlash('Ha ocurrido un error, Intente de Nuevo');
                }
            }
        }
        
        public function edit_respuestas($id=null){
            $this->Respuesta->id = $id;
            $this->Respuesta->recursive = 0;
            
            if($this->request->is('get')) {
                $this->request->data = $this->Respuesta->read();
            } else {
                    //$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
                if ($this->Respuesta->save($this->request->data)) {
                    $this->Session->setFlash('Respuesta de Llamada Registrada Actualizada Correctamente');
                    $this->redirect(array('action' => 'respuestas'));
                } else {
                    $this->Session->setFlash('No se pudo Actualizar, Intente de Nuevo');
                } 
            }
        }
        
        public function relaciones(){
            $this->set('relaciones',$this->RelFamiliar->find('all', array('recursive'=>0)));
        }
        
        public function add_relaciones(){
            if($this->request->is('post')) {
                if($this->RelFamiliar->save($this->request->data)) {
                   $this->Session->setFlash('Relacion Familiar Registrada');
                   $this->redirect(array('action'=>'relaciones'), null, true);
                } else {
                    $this->Session->setFlash('Ha ocurrido un error, Intente de Nuevo');
                }
            }
        }
        
        public function edit_relaciones($id=null){
            $this->RelFamiliar->id = $id;
            $this->RelFamiliar->recursive = 0;
            
            if($this->request->is('get')) {
                $this->request->data = $this->RelFamiliar->read();
            } else {
                    //$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
                if ($this->RelFamiliar->save($this->request->data)) {
                    $this->Session->setFlash('Relacion Familiar Actualizada Correctamente');
                    $this->redirect(array('action' => 'relaciones'));
                } else {
                    $this->Session->setFlash('No se pudo Actualizar, Intente de Nuevo');
                } 
            }
        }
        
        public function about(){
            
        }
        
        public function licencia(){
            
        }
                
    }
    
?>