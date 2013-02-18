<?php 

    class LlamadasController extends AppController {
        public $helpers = array('Html', 'Form','Ajax','SuprForm');
        var $name='Llamadas';        
        var $uses=array('RegLlamada','Ca','Medico','LlamadaObserv','User','ConfLlamada','Respuesta','ElimLlamada','RelFamiliar','Especialidade');
        
        
        public function index(){
            
        }
                
        public function registrar(){
            
            $turno = $this->Session->read('turno');
            
            $cabina = $this->Session->read('cabina');
            
            $user = $this->Session->read('user');
            //cas
            
            
            $this->set('cas',$this->Ca->find('list',
                array( 'fields'=>array( 'Ca.id', 'Ca.cas'), 'recursive'=>0))
            );

            //observaciones
            $this->set('llamadaObservs',$this->LlamadaObserv->find('list',
                                                                    array(
                                                                            'fields'=>array(
                                                                                            'LlamadaObserv.id',
                                                                                            'LlamadaObserv.observacion'), 
                                                                            'recursive'=>0)
                                                                    ));
            //relaciones familiares
            $this->set('relfamiliares',$this->RelFamiliar->find('all',
                                                                array(
                                                                        'fields'=>array(
                                                                                        'RelFamiliar.id',
                                                                                        'RelFamiliar.relacion'), 
                                                                        'recursive'=>0)
                                                                ));
            //fecha actual
            $fecha = date('Y-m-d');
            //total de llamadas registradas en la cabina en el dia
            $this->set('llamregstotalcab',$this->RegLlamada->find('count',
                                                                    array(
                                                                            'conditions' => array(
                                                                                                    'RegLlamada.turno'=>$turno,
                                                                                                    'RegLlamada.cabina'=>$cabina,
                                                                                                    'RegLlamada.created LIKE' => "%$fecha%"), 
                                                                            'recursive'=>0)
                                                                    ));
            //total de llamadas registradas del usuario en el dia
            $this->set('llamregstotaluser',$this->RegLlamada->find('count',
                                                                    array(
                                                                            'conditions' => array(
                                                                                                    'RegLlamada.turno'=>$turno,
                                                                                                    'RegLlamada.created LIKE' => "%$fecha%",
                                                                                                    'RegLlamada.user_id'=>$user), 
                                                                            'recursive'=>0)
                                                                    ));
            //total de llamadas registradas del usuario en la cabina en el dia
            $this->set('llamregscabuser',$this->RegLlamada->find('count',
                                                                    array(
                                                                            'conditions' => array(
                                                                                                    'RegLlamada.turno'=>$turno,
                                                                                                    'RegLlamada.cabina'=>$cabina,
                                                                                                    'RegLlamada.created LIKE' => "%$fecha%",
                                                                                                    'RegLlamada.user_id'=>$user), 
                                                                            'recursive'=>0)
                                                                    ));
            
            //$this->set('llamconftotaluserw',$this->RegLlamada->find('count',array('conditions' => array('RegLlamada.turno'=>$turno,'RegLlamada.cabina'=>$cabina,'RegLlamada.user_id'=>$user), 'recursive'=>0)));
            
            //$this->set('llamelimtotalcabw',$this->RegLlamada->find('count',array('conditions' => array('RegLlamada.turno'=>$turno,'RegLlamada.cabina'=>$cabina,'RegLlamada.user_id'=>$user), 'recursive'=>0)));
            
            //$this->set('llamregsw',$this->RegLlamada->find('count',array('conditions' => array('RegLlamada.turno'=>$turno,'RegLlamada.cabina'=>$cabina,'RegLlamada.user_id'=>$user), 'recursive'=>0)));
            
            //$this->set('fichados',$this->PacienteAfiliacione->find('all', array('conditions' => array('paciente_id' => $FichaPaciente), 'recursive' => 0 )));
            
            if($this->request->is('post')) {
                if($this->RegLlamada->save($this->request->data)) {
                   $this->Session->setFlash('Cita Registrada');
                   $this->redirect(array('action'=>'registrar'), null, true);
                } else {
                    $this->Session->setFlash('Ha ocurrido un error, Intente de Nuevo');
                }
            }
        }
        
        public function confirmar(){
            $turno = $this->Session->read('turno');
            
            $cabina = $this->Session->read('cabina');
            
            $user = $this->Session->read('user');
            
            //fecha actual 
            $fecha = date('Y-m-d');
            //fecha del dia siguiente para poder confirmar las citas del dia siguiente y no dejar citas al aire
            $fecha_maniana = date('Y-m-d', strtotime("+1 day"));            
            //total de llamadas registradas en la cabina en el dia

            $this->set('regLlamadas',$this->RegLlamada->find('list',
                                                                    array(
                                                                            'fields'=>array(
                                                                                                'RegLlamada.id',
                                                                                                'RegLlamada.dni_pac'),
                                                                            'conditions' => array(
                                                                                                    'RegLlamada.cabina'=>$cabina,
                                                                                                    'RegLlamada.fecha_cita LIKE' => "%$fecha_maniana%",
                                                                                                    'Regllamada.cita_otorgada' => 1,
                                                                                                    'RegLlamada.estado'=>0), 
                                                                            'recursive'=>0)
                                                                    ));
            //respuestas
            $this->set('respuestas',$this->Respuesta->find('list',
                                                            array(
                                                                    'fields'=>array(
                                                                                    'Respuesta.id',
                                                                                    'Respuesta.respuesta'), 
                                                                    'recursive'=>0)
                                                            ));
            //relaciones
            $this->set('relFamiliars',$this->RelFamiliar->find('list',
                                                            array(
                                                                    'fields'=>array(
                                                                                    'RelFamiliar.id',
                                                                                    'RelFamiliar.relacion'), 
                                                                    'recursive'=>0)
                                                            ));            

            //total de llamadas registradas en la cabina en el dia en el turno
            $this->set('llamconftotalcab',$this->ConfLlamada->find('count',
                                                                    array(
                                                                            'conditions' => array(
                                                                                                    'ConfLlamada.turno'=>$turno,
                                                                                                    'ConfLlamada.cabina'=>$cabina,
                                                                                                    'ConfLlamada.created LIKE' => "%$fecha%"), 
                                                                    'recursive'=>0)));
            //total de llamadas registradas del usuario en el dia en el turno
            $this->set('llamconftotaluser',$this->ConfLlamada->find('count',
                                                                    array(
                                                                            'conditions' => array(
                                                                                                    'ConfLlamada.turno'=>$turno,
                                                                                                    'ConfLlamada.created LIKE' => "%$fecha%",
                                                                                                    'ConfLlamada.user_id'=>$user), 
                                                                            'recursive'=>0)
                                                                    ));
            //total de llamadas registradas del usuario en la cabina en el dia en el turno
            $this->set('llamconfcabuser',$this->ConfLlamada->find('count',
                                                                    array(
                                                                            'conditions' => array(
                                                                                                    'ConfLlamada.turno'=>$turno,
                                                                                                    'ConfLlamada.cabina'=>$cabina,
                                                                                                    'ConfLlamada.created LIKE' => "%$fecha%",
                                                                                                    'ConfLlamada.user_id'=>$user), 
                                                                            'recursive'=>0)
                                                                            ));
                        
            //$this->set('fichados',$this->PacienteAfiliacione->find('all', array('conditions' => array('paciente_id' => $FichaPaciente), 'recursive' => 0 )));
                        
            if($this->request->is('post')) {
                
                $id = $this->data['ConfLlamada']['reg_llamada_id'];
                
                $user = $this->data['ConfLlamada']['user_id'];
                
                if($this->ConfLlamada->save($this->request->data)) {
                    
                     if($this->RegLlamada->updateAll(array('RegLlamada.estado' => '1','RegLlamada.user_mod'=>$user),array('RegLlamada.id'=>$id))){
                        $this->Session->setFlash('Cita Confirmada');
                        $this->redirect(array('action'=>'confirmar'), null, true);    
                    } else {
                        $this->Session->setFlash('Ha ocurrido un error tipo2, Intente de Nuevo');
                    }
                    
                } else {
                    $this->Session->setFlash('Ha ocurrido un error tipo1, Intente de Nuevo');
                }
            }
        }
        
        public function datos(){
            
            $llamada = $this->data['ConfLlamada']['reg_llamada_id'];
            
            $this->set('datos',$this->RegLlamada->find('all',
                                                        array('conditions'=>array('RegLlamada.id'=>$llamada)
                                                            )
                                                            ));          
            
            
            $this->layout='ajax';
        }
        
        public function eliminar(){
            $turno = $this->Session->read('turno');
            
            $cabina = $this->Session->read('cabina');
            
            $user = $this->Session->read('user');
            
            //fecha actual simple
            $fecha = date('Y-m-d');
            //fecha actual completa
            $fechacom = date('Y-m-d 23:59:59');
            //fecha del dia siguiente para poder confirmar las citas del dia siguiente y no dejar citas al aire
            //$fecha_maniana = date('Y-m-d', strtotime("+1 day"));            
            //total de llamadas registradas que se realizaran en los dias siguientes
            $this->set('llamregsfechatotals',$this->RegLlamada->find('all',array('fields'=>array(       'RegLlamada.id',
                                                                                                        'RegLlamada.dni_pac'),
                                                                                'conditions' => array(
                                                                                                        'RegLlamada.cabina'=>$cabina,
                                                                                                        'RegLlamada.fecha_cita >' => "$fechacom",
                                                                                                        'Regllamada.cita_otorgada' => 1,
                                                                                                        'RegLlamada.estado'=>0), 
                                                                                'recursive'=>0)));
            //relaciones
            $this->set('relaciones',$this->RelFamiliar->find('all',
                                                                        array(  'fields'=>array(
                                                                                                        'RelFamiliar.id',
                                                                                                        'RelFamiliar.relacion'), 
                                                                                'recursive'=>0)));            
            //total de llamadas registradas en la cabina en el dia en el turno
            $this->set('llamelimtotalcab',$this->ElimLlamada->find('count',
                                                                        array(  'conditions' => array(
                                                                                                        'ElimLlamada.turno'=>$turno,
                                                                                                        'ElimLlamada.cabina'=>$cabina,
                                                                                                        'ElimLlamada.created LIKE' => "%$fecha%"), 
                                                                                'recursive'=>0)));
            //total de llamadas registradas del usuario en el dia en el turno
            $this->set('llamelimtotaluser',$this->ElimLlamada->find('count',
                                                                        array(  'conditions' => array(
                                                                                                        'ElimLlamada.turno'=>$turno,
                                                                                                        'ElimLlamada.created LIKE' => "%$fecha%",
                                                                                                        'ElimLlamada.user_id'=>$user), 
                                                                                'recursive'=>0)));
            //total de llamadas registradas del usuario en la cabina en el dia en el turno
            $this->set('llamelimcabuser',$this->ElimLlamada->find('count',
                                                                        array(  'conditions' => array(
                                                                                                        'ElimLlamada.turno'=>$turno,
                                                                                                        'ElimLlamada.cabina'=>$cabina,
                                                                                                        'ElimLlamada.created LIKE' => "%$fecha%",
                                                                                                        'ElimLlamada.user_id'=>$user), 
                                                                                'recursive'=>0)));
                        
            //$this->set('fichados',$this->PacienteAfiliacione->find('all', array('conditions' => array('paciente_id' => $FichaPaciente), 'recursive' => 0 )));
                        
            if($this->request->is('post')) {
                
                $id = $this->data['ElimLlamada']['reg_llamada_id'];
                
                $user = $this->data['ElimLlamada']['user_id'];
                
                if($this->ElimLlamada->save($this->request->data)) {
                    
                     if($this->RegLlamada->updateAll(array('RegLlamada.estado' => '2','RegLlamada.user_mod'=>$user),array('RegLlamada.id'=>$id))){
                        $this->Session->setFlash('Cita Eliminada');
                        $this->redirect(array('action'=>'eliminar'), null, true);    
                    } else {
                        $this->Session->setFlash('Ha ocurrido un error tipo2, Intente de Nuevo');
                    }
                    
                } else {
                    $this->Session->setFlash('Ha ocurrido un error tipo1, Intente de Nuevo');
                }
            }
        }
        
        public function datos2(){
            
            $llamada = $this->data['ElimLlamada']['reg_llamada_id'];
            
            $this->set('datos',$this->RegLlamada->find('all',
                                                        array('conditions'=>array('RegLlamada.id'=>$llamada)
                                                            )
                                                            ));          
            
            
            $this->layout='ajax';
        }
        
        public function index_otorg(){
            
            $turno = $this->Session->read('turno');
            
            $user = $this->Session->read('user');
            
            //fecha actual simple
            $fecha = date('Y-m-d');
            
            $this->set('llamotorgtotalusers',$this->RegLlamada->find('all',
                                                                            array(  'fields'=>array(
                                                                                                        'RegLlamada.turno',
                                                                                                        'RegLlamada.cabina',
                                                                                                        'RegLlamada.dni_pac',
                                                                                                        'Ca.cas',
                                                                                                        'Medico.espec',
                                                                                                        'RegLlamada.fecha_cita',
                                                                                                        'RegLlamada.cita_otorgada',
                                                                                                        'RegLlamada.estado',
                                                                                                        'RegLlamada.created'
                                                                                                        ),                                                                                    
                                                                                    'conditions' => array(
                                                                                                        'RegLlamada.turno'=>$turno,
                                                                                                        'RegLlamada.cita_otorgada'=>'si',
                                                                                                        'RegLlamada.created LIKE' => "%$fecha%",
                                                                                                        'RegLlamada.user_id'=>$user), 
                                                                                    'recursive'=>0)
                                                                    ));
        }
        
        public function index_no_otorg(){
            
            $turno = $this->Session->read('turno');
            
            $user = $this->Session->read('user');
            
            //fecha actual simple
            $fecha = date('Y-m-d');
            
            $this->set('llamnootortotalusers',$this->RegLlamada->find('all',
                                                                            array(  'fields'=>array(
                                                                                                        'RegLlamada.turno',
                                                                                                        'RegLlamada.cabina',
                                                                                                        'RegLlamada.dni_pac',
                                                                                                        'Ca.cas',
                                                                                                        'Medico.espec',
                                                                                                        'RegLlamada.fecha_cita',
                                                                                                        'RegLlamada.cita_otorgada',
                                                                                                        'RegLlamada.created'
                                                                                                        ),                                                                                    
                                                                                    'conditions' => array(
                                                                                                        'RegLlamada.turno'=>$turno,
                                                                                                        'RegLlamada.cita_otorgada'=>'no',
                                                                                                        'RegLlamada.created LIKE' => "%$fecha%",
                                                                                                        'RegLlamada.user_id'=>$user), 
                                                                                    'recursive'=>0)
                                                                    ));
        }
        
        public function index_conf(){
            
            $turno = $this->Session->read('turno');
            
            $user = $this->Session->read('user');
            
            //fecha actual simple
            $fecha = date('Y-m-d');
            
            $this->set('llamconftotalusers',$this->ConfLlamada->find('all',
                                                                            array(  'fields'=>array(
                                                                                                        'ConfLlamada.turno',
                                                                                                        'ConfLlamada.cabina',
                                                                                                        'RegLlamada.dni_pac',
                                                                                                        'Respuesta.respuesta',
                                                                                                        'ConfLlamada.observacion',
                                                                                                        'ConfLlamada.created'
                                                                                                        ),
                                                                                    'conditions' => array(
                                                                                                        'ConfLlamada.turno'=>$turno,
                                                                                                        'ConfLlamada.created LIKE' => "%$fecha%",
                                                                                                        'ConfLlamada.user_id'=>$user
                                                                                                        ), 
                                                                                    'recursive'=>0)
                                                                    ));
        }
        
        public function index_elim(){
            
            $turno = $this->Session->read('turno');
            
            $user = $this->Session->read('user');
            
            //fecha actual simple
            $fecha = date('Y-m-d');
            
            $this->set('llamelimtotalusers',$this->ElimLlamada->find('all',
                                                                            array(  'fields'=>array(
                                                                                                        'ElimLlamada.turno',
                                                                                                        'ElimLlamada.cabina',
                                                                                                        'RegLlamada.dni_pac',
                                                                                                        'RelFamiliar.relacion',
                                                                                                        'ElimLlamada.observacion',
                                                                                                        'ElimLlamada.created'
                                                                                                        ),
                                                                                    'conditions' => array(
                                                                                                        'ElimLlamada.turno'=>$turno,
                                                                                                        'ElimLlamada.created LIKE' => "%$fecha%",
                                                                                                        'ElimLlamada.user_id'=>$user
                                                                                                        ), 
                                                                                    'recursive'=>0)
                                                                    ));
        }
    }
    
?>