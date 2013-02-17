<?php
    class UsersController extends AppController {
        
        public $helpers = array('Html', 'Form');
        public $name='Users';        
        public $components = array('Session');
        public $uses=array('User','Historial');
        
        
        function beforeFilter(){
            parent::beforeFilter();
            $this->Auth->allow('login');
        }
        
        public function index(){
            
            $dato = $this->User->find('all',array('recursive'=>0));
            
            $this->set('users',$dato);
            
            $id1 = $dato[0]['User']['user_id_c'];
                        
            $id2 = $dato[0]['User']['user_mod'];
                
            $user_cre = $this->User->find('first',array('fields'=>array('User.username'),'conditions'=>array('User.id' => $id1),'recursive'=>0));
            $this->set('usercreated',$user_cre);
                
            $user_mod = $this->User->find('first',array('fields'=>array('User.username'),'conditions'=>array('User.id' => $id2),'recursive'=>0));
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
                
                $cabina = $this->data['User']['cabina'];
                
                $this->Session->write('cabina', $cabina);
                
                if($this->Auth->login()){
                    $this->redirect($this->Auth->redirect());
                }else{
                    $this->Session->setFlash('el usuario o el password son incorrectos');
                }
            }
            $this->layout = 'bootstrap/login_layout';
        }
        
        public function logout(){
            $this->redirect($this->Auth->logout());
        }
        
        public function confirmacion(){
            
            if(!empty($this->data)){
                $this->Historial->create();
                
                //$role = $this->request->data['Historial']['role'];
                                               
                //$cabina = $this->request->data['Historial']['cabina'];
                
                //$this->Session->write('cabina', $cabina);
                
                //$fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
                
                $fecha_actual = strtotime(date("Y-m-d H:i:00"));
                
                $fecha_dia = strtotime(date("Y-m-d 06:45:00"));
                
                $fecha_tarde  = strtotime(date("Y-m-d 13:00:00"));
                
                $fecha_noche = strtotime(date("Y-m-d 21:00:00"));
                
                if($fecha_actual > $fecha_dia && $fecha_actual < $fecha_tarde){
                    $this->Session->write('turno','manana');
                }else if($fecha_actual > $fecha_tarde && $fecha_actual < $fecha_noche){
                    $this->Session->write('turno','tarde');
                }else{
                    $this->Session->write('turno','apoyo');
                }
                
                
                $user = $this->request->data['Historial']['user_id'];
                
                $this->Session->write('user',$user);
                
                $role = $this->request->data['Historial']['role'];
                
                if($this->Historial->save($this->data)){
                    if($role=='admin'){
                        $this->redirect(array('controller'=>'reportes','action'=>'citas_reg'),null,true);
                    }else if($role=="super"){
                        $this->redirect(array('controller'=>'llamadas','action'=>'registrar'),null,true);
                    }else if($role=="oper"){
                        $this->redirect(array('controller'=>'llamadas','action'=>'registrar'),null,true);
                    }
                }
            }
            
            $this->layout = 'bootstrap/login_layout';
        } 
        
        public function index2($id = null) {
                        
            if ($this->request->is('post')) {
                $cdiag = $this->request->data['Ciediez']['cdiag'];
                
                $ddiag = $this->request->data['Ciediez']['ddiag'];                
                //$fecha11 = strlen($fecha1);
                                
                if($cdiag != ""){
                    $this->redirect(array('action' => 'index/'.$cdiag));
                    
                }else{
                    $this->redirect(array('action' => 'ddiag/'.$ddiag));
                }
            }
            
            if($id != "") {
                $Listadiagnosticos = $this->Ciediez->find('all',
                                                    array(
                                                            'fields'=>array('Ciediez.ce_cdiag','Ciediez.ce_ddiag','Ciediez.ce_raiz','Ciediez.ce_nivel','Ciediez.ce_sexo'),
                                                            'conditions'=>array('Ciediez.ce_cdiag LIKE' => "%$id%")
                                                            ));
                $this->set('diagnosticos',$Listadiagnosticos);
                
                $this->layout = 'bootstrap/login_layout';   
            }                                   
        }
              
        public function ddiag2($id = null) {
            if ($this->request->is('post')) {
                $cdiag = $this->request->data['Ciediez']['cdiag'];
                
                $ddiag = $this->request->data['Ciediez']['ddiag'];                
                //$fecha11 = strlen($fecha1);
                                
                if($cdiag != ""){
                    $this->redirect(array('action' => 'index/'.$cdiag));
                    
                }else{
                    $this->redirect(array('action' => 'ddiag/'.$ddiag));
                }
            }
            
            if($id != "") {
                $Listadiagnosticos = $this->Ciediez->find('all',
                                                    array(
                                                            'fields'=>array('Ciediez.ce_cdiag','Ciediez.ce_ddiag','Ciediez.ce_raiz','Ciediez.ce_nivel','Ciediez.ce_sexo'),
                                                            'conditions'=>array('Ciediez.ce_ddiag LIKE' => "%$id%")
                                                            ));
                $this->set('diagnosticos',$Listadiagnosticos);
                
                $this->layout = 'bootstrap/login_layout';

            }
        }
               
    }
?>