<?php 

    class ReportesController extends AppController {
        public $helpers = array('Html', 'Form');
        var $name='Reportes';        
        var $uses=array('Historial','RegLlamada','Ca','Medico','LlamadaObserv','User','ConfLlamada','Respuesta','ElimLlamada','RelFamiliar');
        
        //public $layout = 'admin';
        
        //menu
        public function index(){
            
        }
        
        public function citas_reg(){
            //operadores
            $this->set('operadores',$this->User->find('all',array('fields'=>array('User.id','User.nombres','User.ap_paterno','User.ap_materno','User.role'),'recursive'=>0)));
            //CAS
            $this->set('cas',$this->Ca->find('all',array('fields'=>array('Ca.id','Ca.cas'),'recursive'=>0)));
            
            //recopilacion y envio de datos
            if($this->request->is('post')) {
                
                if($this->data['Completo']['form'] == 1){
                    
                    //SESSION DEL AÑO
                    $anio = $this->data['Completo']['anio'];
                    
                    $this->Session->write('anio', $anio);
                    
                    //TIPO 1 = ESTADISTICO, TIPO 2 = LISTADO    
                    if($this->data['Completo']['tipo'] == 1){
                        
                        $this->redirect(array('action'=>'citas_reg_11'), null, true);   
                                                    
                    }else if($this->data['Completo']['tipo'] == 2){
                        
                        $this->redirect(array('action'=>'citas_reg_12'), null, true);    
                        
                    }                        
                    
                    
                    
                }else if($this->data['Operador']['form'] == 2){
                    if($this->data['Operador']['tipo'] == 1){
                        
                    }else if($this->data['Operador']['tipo'] == 2){
                        
                    }else if($this->data['Operador']['tipo'] == 3){
                        
                    }
                    
                }else if($this->data['Cas']['form'] == 3){
                    if($this->data['Cas']['tipo'] == 1){
                        
                    }else if($this->data['Cas']['tipo'] == 2){
                        
                    }else if($thisr->data['Cas']['tipo'] == 3){
                        
                    }
                }
                                
            }                       
            
        }
        
        //REPORTES PDF DE CITAS REGISTRADAS
        public function citas_reg_11(){
            $anio = $this->Session->read('anio');
            $this->Session->delete('anio');            
            $mes = $this->Session->read('mes');
            $this->Session->delete('mes');
                        
            $this->set('anio',$anio);                
            
            ///CONTEO DE ATENCIONES POR MES EN EL AÑO                                   
            $this->set('enero', $this->RegLlamada->find('count', array('conditions' => array('RegLlamada.created LIKE' => '%'.$anio.'-01%'))));
            $this->set('febrero', $this->RegLlamada->find('count', array('conditions' => array('RegLlamada.created LIKE' => '%'.$anio.'-02%'))));
            $this->set('marzo', $this->RegLlamada->find('count', array('conditions' => array('RegLlamada.created LIKE' => '%'.$anio.'-03%'))));
            $this->set('abril', $this->RegLlamada->find('count', array('conditions' => array('RegLlamada.created LIKE' => '%'.$anio.'-04%'))));
            $this->set('mayo', $this->RegLlamada->find('count', array('conditions' => array('RegLlamada.created LIKE' => '%'.$anio.'-05%'))));
            $this->set('junio', $this->RegLlamada->find('count', array('conditions' => array('RegLlamada.created LIKE' => '%'.$anio.'-06%'))));
            $this->set('julio', $this->RegLlamada->find('count', array('conditions' => array('RegLlamada.created LIKE' => '%'.$anio.'-07%'))));
            $this->set('agosto', $this->RegLlamada->find('count', array('conditions' => array('RegLlamada.created LIKE' => '%'.$anio.'-08%'))));
            $this->set('setiembre', $this->RegLlamada->find('count', array('conditions' => array('RegLlamada.created LIKE' => '%'.$anio.'-09%'))));
            $this->set('octubre', $this->RegLlamada->find('count', array('conditions' => array('RegLlamada.created LIKE' => '%'.$anio.'-10%'))));
            $this->set('noviembre', $this->RegLlamada->find('count', array('conditions' => array('RegLlamada.created LIKE' => "%$anio-11%"))));
            $this->set('diciembre', $this->RegLlamada->find('count', array('conditions' => array('RegLlamada.created LIKE' => "%$anio-12%"))));
            
            
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }

        public function citas_reg_12(){
            $anio = $this->Session->read('anio');
            $this->Session->delete('anio');            
            $mes = $this->Session->read('mes');
            $this->Session->delete('mes');
                        
            $this->set('anio',$anio);                
            
            ///CONTEO DE ATENCIONES POR MES EN EL AÑO                                   
            $this->set('enero', $this->RegLlamada->find('all', 
                                                                array(  'fields' => array(
                                                                                            'RegLlamada.turno',
                                                                                            'RegLlamada.cabina',
                                                                                            'RegLlamada.dni_pac',
                                                                                            'ca.cas',
                                                                                            'Medico.espec',
                                                                                            'RegLlamada.estado',
                                                                                            'RegLlamada.created',
                                                                                            'User.username'                                                                                                                                                                                               
                                                                                            ),
                                                                        'conditions' => array(
                                                                                            'RegLlamada.created LIKE' => '%'.$anio.'-01%'),
                                                                        'recursive'=>0)
                                                                        
                                                        ));
            $this->set('febrero', $this->RegLlamada->find('all', 
                                                                array(  'fields' => array(
                                                                                            'RegLlamada.turno',
                                                                                            'RegLlamada.cabina',
                                                                                            'RegLlamada.dni_pac',
                                                                                            'ca.cas',
                                                                                            'Medico.espec',
                                                                                            'RegLlamada.estado',
                                                                                            'RegLlamada.created',
                                                                                            'User.username'                                                                                                                                                                                               
                                                                                            ),
                                                                        'conditions' => array(
                                                                                            'RegLlamada.created LIKE' => '%'.$anio.'-02%'),
                                                                        'recursive'=>0)
                                                                        
                                                        ));
            $this->set('marzo', $this->RegLlamada->find('all', 
                                                                array(  'fields' => array(
                                                                                            'RegLlamada.turno',
                                                                                            'RegLlamada.cabina',
                                                                                            'RegLlamada.dni_pac',
                                                                                            'ca.cas',
                                                                                            'Medico.espec',
                                                                                            'RegLlamada.estado',
                                                                                            'RegLlamada.created',
                                                                                            'User.username'                                                                                                                                                                                               
                                                                                            ),
                                                                        'conditions' => array(
                                                                                            'RegLlamada.created LIKE' => '%'.$anio.'-03%'),
                                                                        'recursive'=>0)
                                                                        
                                                        ));
            $this->set('abril', $this->RegLlamada->find('all', 
                                                                array(  'fields' => array(
                                                                                            'RegLlamada.turno',
                                                                                            'RegLlamada.cabina',
                                                                                            'RegLlamada.dni_pac',
                                                                                            'ca.cas',
                                                                                            'Medico.espec',
                                                                                            'RegLlamada.estado',
                                                                                            'RegLlamada.created',
                                                                                            'User.username'                                                                                                                                                                                               
                                                                                            ),
                                                                        'conditions' => array(
                                                                                            'RegLlamada.created LIKE' => '%'.$anio.'-04%'),
                                                                        'recursive'=>0)
                                                                        
                                                        ));
            $this->set('mayo', $this->RegLlamada->find('all', 
                                                                array(  'fields' => array(
                                                                                            'RegLlamada.turno',
                                                                                            'RegLlamada.cabina',
                                                                                            'RegLlamada.dni_pac',
                                                                                            'ca.cas',
                                                                                            'Medico.espec',
                                                                                            'RegLlamada.estado',
                                                                                            'RegLlamada.created',
                                                                                            'User.username'                                                                                                                                                                                               
                                                                                            ),
                                                                        'conditions' => array(
                                                                                            'RegLlamada.created LIKE' => '%'.$anio.'-05%'),
                                                                        'recursive'=>0)
                                                                        
                                                        ));
            $this->set('junio', $this->RegLlamada->find('all', 
                                                                array(  'fields' => array(
                                                                                            'RegLlamada.turno',
                                                                                            'RegLlamada.cabina',
                                                                                            'RegLlamada.dni_pac',
                                                                                            'ca.cas',
                                                                                            'Medico.espec',
                                                                                            'RegLlamada.estado',
                                                                                            'RegLlamada.created',
                                                                                            'User.username'                                                                                                                                                                                               
                                                                                            ),
                                                                        'conditions' => array(
                                                                                            'RegLlamada.created LIKE' => '%'.$anio.'-06%'),
                                                                        'recursive'=>0)
                                                                        
                                                        ));
            $this->set('julio', $this->RegLlamada->find('all', 
                                                                array(  'fields' => array(
                                                                                            'RegLlamada.turno',
                                                                                            'RegLlamada.cabina',
                                                                                            'RegLlamada.dni_pac',
                                                                                            'ca.cas',
                                                                                            'Medico.espec',
                                                                                            'RegLlamada.estado',
                                                                                            'RegLlamada.created',
                                                                                            'User.username'                                                                                                                                                                                               
                                                                                            ),
                                                                        'conditions' => array(
                                                                                            'RegLlamada.created LIKE' => '%'.$anio.'-07%'),
                                                                        'recursive'=>0)
                                                                        
                                                        ));
            $this->set('agosto', $this->RegLlamada->find('all', 
                                                                array(  'fields' => array(
                                                                                            'RegLlamada.turno',
                                                                                            'RegLlamada.cabina',
                                                                                            'RegLlamada.dni_pac',
                                                                                            'ca.cas',
                                                                                            'Medico.espec',
                                                                                            'RegLlamada.estado',
                                                                                            'RegLlamada.created',
                                                                                            'User.username'                                                                                                                                                                                               
                                                                                            ),
                                                                        'conditions' => array(
                                                                                            'RegLlamada.created LIKE' => '%'.$anio.'-08%'),
                                                                        'recursive'=>0)
                                                                        
                                                        ));
            $this->set('setiembre', $this->RegLlamada->find('all', 
                                                                array(  'fields' => array(
                                                                                            'RegLlamada.turno',
                                                                                            'RegLlamada.cabina',
                                                                                            'RegLlamada.dni_pac',
                                                                                            'ca.cas',
                                                                                            'Medico.espec',
                                                                                            'RegLlamada.estado',
                                                                                            'RegLlamada.created',
                                                                                            'User.username'                                                                                                                                                                                               
                                                                                            ),
                                                                        'conditions' => array(
                                                                                            'RegLlamada.created LIKE' => '%'.$anio.'-09%'),
                                                                        'recursive'=>0)
                                                                        
                                                        ));
            $this->set('octubre', $this->RegLlamada->find('all', 
                                                                array(  'fields' => array(
                                                                                            'RegLlamada.turno',
                                                                                            'RegLlamada.cabina',
                                                                                            'RegLlamada.dni_pac',
                                                                                            'ca.cas',
                                                                                            'Medico.espec',
                                                                                            'RegLlamada.estado',
                                                                                            'RegLlamada.created',
                                                                                            'User.username'                                                                                                                                                                                               
                                                                                            ),
                                                                        'conditions' => array(
                                                                                            'RegLlamada.created LIKE' => '%'.$anio.'-10%'),
                                                                        'recursive'=>0)
                                                                        
                                                        ));
            $this->set('noviembre', $this->RegLlamada->find('all', 
                                                                array(  'fields' => array(
                                                                                            'RegLlamada.turno',
                                                                                            'RegLlamada.cabina',
                                                                                            'RegLlamada.dni_pac',
                                                                                            'ca.cas',
                                                                                            'Medico.espec',
                                                                                            'RegLlamada.estado',
                                                                                            'RegLlamada.created',
                                                                                            'User.username'                                                                                                                                                                                               
                                                                                            ),
                                                                        'conditions' => array(
                                                                                            'RegLlamada.created LIKE' => '%'.$anio.'-11%'),
                                                                        'recursive'=>0)
                                                                        
                                                        ));
            $this->set('diciembre', $this->RegLlamada->find('all', 
                                                                array(  'fields' => array(
                                                                                            'RegLlamada.turno',
                                                                                            'RegLlamada.cabina',
                                                                                            'RegLlamada.dni_pac',
                                                                                            'ca.cas',
                                                                                            'Medico.espec',
                                                                                            'RegLlamada.estado',
                                                                                            'RegLlamada.created',
                                                                                            'User.username'                                                                                                                                                                                               
                                                                                            ),
                                                                        'conditions' => array(
                                                                                            'RegLlamada.created LIKE' => '%'.$anio.'-12%'),
                                                                        'recursive'=>0)
                                                                        
                                                        ));                                                                                               
                        
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
        
        public function citas_reg_121(){
            $anio = $this->Session->read('anio');
            $this->Session->delete('anio');            
            $mes = $this->Session->read('mes');
            $this->Session->delete('mes');
            
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
        
        public function citas_reg_122(){
            $anio = $this->Session->read('anio');
            $this->Session->delete('anio');            
            $mes = $this->Session->read('mes');
            $this->Session->delete('mes');
            
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
        
        public function citas_reg_131(){
            $anio = $this->Session->read('anio');
            $this->Session->delete('anio');            
            $mes = $this->Session->read('mes');
            $this->Session->delete('mes');
            
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
        
        public function citas_reg_132(){
            $anio = $this->Session->read('anio');
            $this->Session->delete('anio');            
            $mes = $this->Session->read('mes');
            $this->Session->delete('mes');
            
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
        
        public function citas_reg_21(){
            $anio = $this->Session->read('anio');
            $this->Session->delete('anio');            
            $mes = $this->Session->read('mes');
            $this->Session->delete('mes');
            
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
        
        public function citas_reg_22(){
            $anio = $this->Session->read('anio');
            $this->Session->delete('anio');            
            $mes = $this->Session->read('mes');
            $this->Session->delete('mes');
            
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
        
        public function citas_reg_23(){
            $anio = $this->Session->read('anio');
            $this->Session->delete('anio');            
            $mes = $this->Session->read('mes');
            $this->Session->delete('mes');
            
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
        public function citas_reg_31(){
            $anio = $this->Session->read('anio');
            $this->Session->delete('anio');            
            $mes = $this->Session->read('mes');
            $this->Session->delete('mes');
            
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
        
        public function citas_reg_32(){
            $anio = $this->Session->read('anio');
            $this->Session->delete('anio');            
            $mes = $this->Session->read('mes');
            $this->Session->delete('mes');
            
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
        
        public function citas_reg_33(){
            $anio = $this->Session->read('anio');
            $this->Session->delete('anio');            
            $mes = $this->Session->read('mes');
            $this->Session->delete('mes');
            
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
        //FIN REPORTES CITAS REGISTRADAS
        
        public function citas_otorg(){
            $this->set('Users',$this->User->find('all'));
            
        }
                
        public function citas_conf(){
            $this->set('Users',$this->User->find('all'));
            
        }
        
        public function citas_elim(){
            $this->set('Users',$this->User->find('all'));
            
        }
        
        public function acceso(){
            $this->set('Users',$this->User->find('all'));
        }
        
        public function citas_reg_pdf(){
            $this->set('Users',$this->User->find('all'));
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
        
        public function citas_otorg_pdf(){
            $this->set('Users',$this->User->find('all'));
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
        
        public function citas_conf_pef(){
            $this->set('Users',$this->User->find('all'));
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
        
        public function citas_elim_pdf(){
            $this->set('Users',$this->User->find('all'));
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
        
        public function acceso_pdf(){
            $this->set('Users',$this->User->find('all'));
            $this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
        }
    }
    
?>