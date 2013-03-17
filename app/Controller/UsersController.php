<?php
    class UsersController extends AppController {
        
        public $helpers = array('Html', 'Form');
        public $name='Users';        
        public $components = array('Session');
        public $uses=array('User','Historial','Cabina');
        
        
        function beforeFilter(){
            parent::beforeFilter();
            $this->Auth->allow('login');
        }
        
        public function index(){
            
            $dato = $this->User->find('all',array('recursive'=>0));
            
            $this->set('users',$dato);
            
            $id1 = $dato[0]['User']['user_id_c'];
                        
            $id2 = $dato[0]['User']['user_mod'];
                
            $user_cre = $this->User->find('first',array(
                                                        'fields'=>array(
                                                                        'User.username'),
                                                        'conditions'=>array
                                                                        ('User.id' => $id1),
                                                        'recursive'=>0));
            $this->set('usercreated',$user_cre);
                
            $user_mod = $this->User->find('first',array(
                                                        'fields'=>array(
                                                                        'User.username'),
                                                        'conditions'=>array(
                                                                        'User.id' => $id2),
                                                        'recursive'=>0));
            $this->set('usermodified',$user_mod);
            
        }
        
        public function add(){
            if($this->request->is('post')) {
                if($this->User->save($this->request->data)) {
                   $this->Session->setFlash('Usuario Registrado');
                   $this->redirect(array('action'=>'index'), null, true);
                } else {
                    $this->Session->setFlash('Ha ocurrido un error, Intente de Nuevo');
                }
            }
        }
        
        public function edit($id=null){
            
            $this->User->id = $id;
            $this->User->recursive = 0;
            
            if($this->request->is('get')) {
                
                $dato = $this->User->read();
                
                $this->set('datos',$dato);
                
                $this->request->data = $dato;
                
            } else {
                    //$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash('El Usuario se ha Actualizado Correctamente');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('No se pudo Actualizar, Intente de Nuevo');
                } 
            }
        }
        
        public function login(){
            
            if($this->request->is('post')){
                
                //$cabina = $this->data['User']['cabina'];
                
                //$this->Session->write('cabina', $cabina);
                
                if($this->Auth->login()){
                    
                    $turno = $this->Auth->user('turno');
                    
                    $fecha_actual = strtotime(date("Y-m-d H:i:00"));
                    $fecha_dia = strtotime(date("Y-m-d 05:45:00"));
                    $fecha_dia_salida = strtotime(date("Y-m-d 14:00:00"));                                
                    $fecha_tarde  = strtotime(date("Y-m-d 13:45:00"));
                    $fecha_noche = strtotime(date("Y-m-d 22:10:00"));
                    
                    if($fecha_actual > $fecha_dia && $fecha_actual < $fecha_dia_salida && $turno == 'manana'){
                        //$this->Session->write('horario','manana');
                        $this->Session->write('turno','manana');
                    }else if($fecha_actual > $fecha_dia && $fecha_actual < $fecha_dia_salida && $turno == 'tarde'){
                        //$this->Session->write('horario','manana');
                        $this->Session->write('turno','apoyo');
                    }else if($fecha_actual > $fecha_tarde && $fecha_actual < $fecha_noche && $turno == 'manana'){
                        //$this->Session->write('horario','tarde');
                        $this->Session->write('turno','apoyo');
                    }else if($fecha_actual > $fecha_tarde && $fecha_actual < $fecha_noche && $turno == 'tarde'){
                        //$this->Session->write('horario','tarde');
                        $this->Session->write('turno','tarde');
                    }else{
                        $this->Session->write('turno','rest');
                    }
                    
                    $id = $this->Auth->user('id');                    
                    
                    $role = $this->Auth->user('role');
                    
                    $ip_pc = $_SERVER['REMOTE_ADDR'];
                    
                    $cabina = $this->Cabina->find('first',array('fields'=>array('Cabina.id','Cabina.cabina'),'conditions'=>array('Cabina.ip' => $ip_pc),'recursive'=>0));
                    
                    
                    $this->Session->write('id_cabina',$cabina['Cabina']['id']);
                    
                    $this->Session->write('num_cabina',$cabina['Cabina']['cabina']);
                    
                    
                    $this->request->data['Historial']['user_id'] = $id;
                    
                    $this->request->data['Historial']['cabina_id'] = $cabina['Cabina']['id'];
                    
                    $this->request->data['Historial']['turno'] = $this->Session->read('turno');
                    
                                     
                    if($this->Historial->save($this->data)){
                        
                        $historial_id = $this->Historial->read('Historial.id');
                        
                        $this->Session->write('historial',$historial_id['Historial']['id']);
                                                
                        if($role=='admin'){
                            $this->redirect($this->Auth->redirect());
                        }else if($role=="super"){
                            $this->redirect(array('controller'=>'llamadas','action'=>'registrar'),null,true);
                        }else if($role=="oper"){
                            $this->redirect(array('controller'=>'llamadas','action'=>'registrar'),null,true);
                        }
                    }                
                    
                }else{
                    $this->Session->setFlash('el usuario o el password son incorrectos');
                }
            }
            $this->layout = 'bootstrap/login_layout';
        }
        
        public function logout(){
            
            $id = $this->Session->read('historial');
            
            $this->Historial->id = $id;
            
            $this->Historial->save($this->request->data);
            
            $this->redirect($this->Auth->logout());
        }
                      
    }
?>