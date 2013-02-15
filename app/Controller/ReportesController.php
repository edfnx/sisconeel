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
                    
                    $anio = $this->data['Completo']['anio'];
                    
                    $this->Session->write('anio', $anio);
                    
                    $mes = $this->data['Completo']['mes'];
                    
                    $this->Session->write('mes', $mes);
                    
                    if($this->data['Completo']['tipo'] == 1){
                        if(strlen($mes) == 0){
                            $this->redirect(array('action'=>'citas_reg_111'), null, true);   
                        }else{
                            $this->redirect(array('action'=>'citas_reg_112'), null, true);
                        }                            
                    }else if($this->data['Completo']['tipo'] == 2){
                        if(strlen($mes) == 0){
                            $this->redirect(array('action'=>'citas_reg_121'), null, true);    
                        }else{
                            $this->redirect(array('action'=>'citas_reg_122'), null, true);
                        }
                    }else if($this->data['Completo']['tipo'] == 3){
                        if(strlen($mes) == 0){
                            $this->redirect(array('action'=>'citas_reg_131'), null, true);    
                        }else{
                            $this->redirect(array('action'=>'citas_reg_132'), null, true);
                        }                        
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
        public function citas_reg_111(){
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

        public function citas_reg_112(){
            $anio = $this->Session->read('anio');
            $this->Session->delete('anio');            
            $mes = $this->Session->read('mes');
            $this->Session->delete('mes');
                        
            $this->set('anio',$anio);
                
            if($mes == "01"){
                $this->set('mes',"Enero");                    
            }else if($mes == "02"){
                $this->set('mes',"Febrero");   
            }else if($mes == "03"){
                $this->set('mes',"Marzo");
            }else if($mes == "04"){
                   $this->set('mes',"Abril");
            }else if($mes == "05"){
                $this->set('mes',"Mayo");
            }else if($mes == "06"){
                $this->set('mes',"Junio");
            }else if($mes == "07"){
                $this->set('mes',"Julio");
            }else if($mes == "08"){
                $this->set('mes',"Agosto");
            }else if($mes == "09"){
                $this->set('mes',"Setiembre");
            }else if($mes == "10"){
                $this->set('mes',"Octubre");
            }else if($mes == "11"){
                $this->set('mes',"Noviembre");
            }else if($mes == "12"){
                $this->set('mes',"Diciembre");
            }
            
            
            
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