<?php 

	class ReportesController extends AppController {
		public $helpers = array('Html', 'Form');
		public $name='Reportes';        
		public $uses=array('Historial','RegLlamada','Ca','Especialidade','Medico','LlamadaObserv','User','ConfLlamada','Respuesta','ElimLlamada','RelFamiliar');
		public $months = array( 'ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SET', 'OCT', 'NOV', 'DIC');
		
		//public $layout = 'admin';
		
		//menu
		public function index(){
			
		}
		
		public function citas_reg(){
			//operadores
			$this->set('operadors',$this->User->find('list',
															array(
																	'fields'=>array(
																					'User.id',
																					'User.username'),
																	'recursive'=>0)
															));
			//CAS
			$this->set('cas',$this->Ca->find('list',
													array(
															'fields'=>array(
																			'Ca.id',
																			'Ca.cas'),
															'recursive'=>0)
												));
			//ESPECIALIDAD
			$this->set('especialidads',$this->Especialidade->find('list',
													array(
															'fields'=>array(
																			'Especialidade.id',
																			'Especialidade.especialidad'),
															'recursive'=>0)
												));
			
			//recopilacion y envio de datos
			if($this->request->is('post')) {
				
				//FORMULARIO COMPLETO
				if($this->data['Completo']['form'] == 1){
					
					//SESSION DEL AÑO
					$anio = $this->data['Completo']['anio'];
					
					$this->Session->write('anio', $anio);
					
					//TIPO 1 = ESTADISTICO,     
					if($this->data['Completo']['tipo'] == 1){
						//GRAFICO ESTADISTICO ANUAL
						$this->redirect(array('action'=>'citas_reg_11'), null, true);   
					
					//TIPO 2 = LISTADO                                
					}else if($this->data['Completo']['tipo'] == 2){
						//LISTADO ANUAL
						$this->redirect(array('action'=>'citas_reg_12'), null, true);    
						
					}                        
				//FORMULARIO POR OPERADOR
				}else if($this->data['Operador']['form'] == 2){
					
					//SESSION DEL AÑO
					$anio = $this->data['Operador']['anio'];
					
					$this->Session->write('anio', $anio);
					
					//SESSION DEL MES
					$mes = $this->data['Operador']['mes'];
					
					$this->Session->write('mes', $mes);
					
					//SESSION DEL OPERADOR
					$operador = $this->data['Operador']['operador'];
					
					$this->Session->write('operador', $operador);
					
					//TIPO 1 = ESTADISTICO,                     
					if($this->data['Operador']['tipo'] == 1){
						if($mes == ""){
							if($operador == ""){
								//GRAFICO ESTADISTICO ANUAL DE TODAS LAS OPERADORAS
								$this->redirect(array('action'=>'citas_reg_2111'), null, true);
							}else{
								//GRAFICO ESTADISTICO ANUAL POR OPERADORA
								$this->redirect(array('action'=>'citas_reg_2112'), null, true);
							}
						}else{
							if($operador == ""){
								//GRAFICO ESTADISTICO MENSUAL DE TODAS LAS OPERADORAS
								$this->redirect(array('action'=>'citas_reg_2121'), null, true);
							}else{
								//GRAFICO ESTADISTICO MENSUAL POR OPERADORA
								$this->redirect(array('action'=>'citas_reg_2122'), null, true);
							}
						}
						
					//TIPO 2 = LISTADO   
					}else if($this->data['Operador']['tipo'] == 2){
						if($mes == ""){
							if($operador == ""){
								//LISTADO ANUAL DE TODAS LAS OPERADORAS
								$this->redirect(array('action'=>'citas_reg_2211'), null, true);
							}else{
								//LISTADO ANUAL POR OPERADORA
								$this->redirect(array('action'=>'citas_reg_2212'), null, true);
							}
						}else{
							if($operador == ""){
								//LISTADO MENSUAL DE TODAS LAS OPERADORAS
								$this->redirect(array('action'=>'citas_reg_2221'), null, true);
							}else{
								//LISTADO MENSUAL POR OPERADORA
								$this->redirect(array('action'=>'citas_reg_2222'), null, true);
							}
						}
					}
				//FORMULARIO POR CAS    
				}else if($this->data['Cas']['form'] == 3){
					
					//SESSION DEL AÑO
					$anio = $this->data['Cas']['anio'];
					
					$this->Session->write('anio', $anio);
					
					//SESSION DEL MES
					$mes = $this->data['Cas']['mes'];
					
					$this->Session->write('mes', $mes);
					
					//SESSION DEL CAS
					$cas = $this->data['Cas']['cas'];
					
					$this->Session->write('cas', $cas);
					
					//SESSION DE LA ESPECILIDAD
					$espec = $this->data['Cas']['especialidad'];
					
					$this->Session->write('especialidad', $espec);
					
					
					if($this->data['Cas']['tipo'] == 1){
						if($mes == ""){
							if($cas == ""){
								//GRAFICO ESTADISTICO ANUAL DE TODAS LAS ESPECIALIDADES DEL CAS
								$this->redirect(array('action'=>'citas_reg_3111'), null, true);                                
							}else{
								//GRAFICO ESTADISTICO ANUAL POR ESPECIALIDAD DEL CAS
								$this->redirect(array('action'=>'citas_reg_3112'), null, true);                                
							}
						}else{
							if($cas == ""){
								//GRAFICO ESTADISTICO MENSUAL DE TODAS LAS ESPECIALIDADES DEL CAS
								$this->redirect(array('action'=>'citas_reg_3121'), null, true);
							}else{
								//GRAFICO ESTADISTICO MENSUAL POR ESPECIALIDAD DEL CAS
								$this->redirect(array('action'=>'citas_reg_3122'), null, true);
							}
						}
					}else if($this->data['Cas']['tipo'] == 2){
						if($mes == ""){
							if($cas == ""){
								//LISTADO ANUAL DE TODAS LAS ESPECIALIDADES DEL CAS
								$this->redirect(array('action'=>'citas_reg_3211'), null, true);                                
							}else{
								//LISTADO ANUAL POR ESPECIALIDAD DEL CAS
								$this->redirect(array('action'=>'citas_reg_3212'), null, true);                                
							}
						}else{
							if($cas == ""){
								//LISTADO MENSUAL DE TODAS LAS ESPECIALIDADES DEL CAS
								$this->redirect(array('action'=>'citas_reg_3221'), null, true);
							}else{
								//LISTADO MENSUAL POR ESPECIALIDAD DEL CAS
								$this->redirect(array('action'=>'citas_reg_3222'), null, true);
							}
						}
					}
				//FORMULARIO POR ESPECIALIDAD
				}else if($this->data['Especialidad']['form'] == 4){
					
					//SESSION DEL AÑO
					$anio = $this->data['Especialidad']['anio'];
					
					$this->Session->write('anio', $anio);
					
					//SESSION DEL MES
					$mes = $this->data['Especialidad']['mes'];
					
					$this->Session->write('mes', $mes);
										
					//SESSION DE LA ESPECILIDAD
					$espec = $this->data['Especialidad']['especialidad'];
					
					$this->Session->write('especialidad', $espec);
					
					//TIPO 1 = ESTADISTICO,
					if($this->data['Especialidad']['tipo'] == 1){
						if($mes == ""){
							if($espec == ""){
								//GRAFICO ESTADISTICO ANUAL DE TODAS LAS ESPECIALIDADES
								$this->redirect(array('action'=>'citas_reg_4111'), null, true);
							}else{
								//GRAFICO ESTADISTICO ANUAL POR ESPECIALIDAD
								$this->redirect(array('action'=>'citas_reg_4112'), null, true);
							}
						}else{
							if($espec == ""){
								//GRAFICO ESTADISTICO MENSUAL DE TODAS LAS ESPECIALIDADES
								$this->redirect(array('action'=>'citas_reg_4121'), null, true);
							}else{
								//GRAFICO ESTADISTICO MENSUAL POR ESPECIALIDAD
								$this->redirect(array('action'=>'citas_reg_4122'), null, true);
							}
						}
						
					//TIPO 2 = LISTADO
					}else if($this->data['Especialidad']['tipo'] == 2){
						if($mes == ""){
							if($espec == ""){
								//LISTADO ANUAL DE TODAS LAS ESPECIALIDADES
								$this->redirect(array('action'=>'citas_reg_4211'), null, true);
							}else{
								//LISTADO ANUAL POR ESPECIALIDAD
								$this->redirect(array('action'=>'citas_reg_4212'), null, true);
							}
						}else{
							if($espec == ""){
								//LISTADO MENSUAL DE TODAS LAS ESPECIALIDADES
								$this->redirect(array('action'=>'citas_reg_4221'), null, true);
							}else{
								//LISTADO MENSUAL POR ESPECIALIDAD
								$this->redirect(array('action'=>'citas_reg_4222'), null, true);
							}
						}
					}
					
						
					
				}
								
			}                       
			
		}
		
		public function espec(){
			
			$cas = $this->data['Cas']['cas'];
			
			$this->set('especialidads',$this->Especialidade->find('list',
													array(
															'fields'=>array(
																			'Especialidade.id',
																			'Especialidade.especialidad'),
															'conditiona'=>array(
																			'Especialidade.ca_id'=>$cas),
															'recursive'=>0)
												));
						
			$this->layout='ajax';
		}
		
		//REPORTES PDF DE CITAS REGISTRADAS
		
		//INICIO REPORTES COMPLETO
		
		//REPORTE ESTADISTICO ANUAL COMPLETO
		public function citas_reg_11_(){
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

		//REPORTES PDF DE CITAS REGISTRADAS (JSON)
		public function citas_reg_11_json(){

			// Cabeceras JSON
			$this->viewClass = 'Json';
			$this->RequestHandler->setContent('json', 'application/json');

			$anio = $this->Session->read('anio');
			$mes = $this->Session->read('mes');                        
			$this->set('anio',$anio);                
			
			$months = array(
				'ENE',
				'FEB',
				'MAR',
				'ABR',
				'MAY',
				'JUN',
				'JUL',
				'AGO',
				'SET',
				'OCT',
				'NOV',
				'DIC',
				);

			$data = array();

			foreach ($months as $key => $month) {
				$i = $key + 1;
				array_push($data, 
					array(
						$months[$key], 
						$this->RegLlamada->find('count', array('conditions' => array('RegLlamada.created LIKE' => '%'.$anio.'-0'.$i.'%')))
					)
				);
			}
			
			$this->set('data', $data);
			$this->set('__serialize', 'data');
		}
		//REPORTES PDF DE CITAS REGISTRADAS (PDF)
		public function citas_reg_11(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
						
			$this->set('anio',$anio);                

			$this->layout = "/bootstrap/pdf_layout";
		}


		//REPORTE LISTADO ANULA COMPLETO

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
		
		//INICIO REPORTES OPERADOR
				  
		//GRAFICO ESTADISTICO ANUAL DE TODAS LAS OPERADORAS
		public function citas_reg_2111_(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');
						
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			
			$operador = $this->Session->read('operador');
			$this->Session->delete('operador');
						
			$this->set('operador_citas', $this->RegLlamada->query("SELECT user_id ,count(user_id) FROM reg_llamadas WHERE created LIKE '%$anio%' GROUP BY user_id"));
						
			$this->set('operadores' ,$this->User->find(
				'all',array(
						'fields'=>array(
										'User.id',
										'User.nombres',
										'User.ap_paterno',
										'User.ap_materno'),
						'recursive'=>0)
			));
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}

		public function citas_reg_2111_json(){

			// Cabeceras JSON
			$this->viewClass = 'Json';
			$this->RequestHandler->setContent('json', 'application/json');
			
			$anio = $this->Session->read('anio');
			$mes = $this->Session->read('mes');
			$operador = $this->Session->read('operador');
						
			$operador_citas = $this->RegLlamada->query("SELECT user_id , count(user_id) as amount FROM reg_llamadas WHERE created LIKE '%$anio%' GROUP BY user_id");                        
	
						
			$operadores = $this->User->find(
				'all',array(
						'fields'=>array(
										'User.id',
										'User.nombres',
										'User.ap_paterno',
										'User.ap_materno'
									),
						'recursive' => 0 )
			);

			$data = array();

			foreach($operador_citas as $operador_cita){
				foreach($operadores as $operador){
					if($operador_cita['reg_llamadas']['user_id'] == $operador['User']['id']){
						array_push( $data, 
							array(
								$operador['User']['id'],
								$operador_cita[0]['amount'],
								$operador['User']['nombres']." ".$operador['User']['ap_paterno']." ".$operador['User']['ap_materno']
							)
						);
				   }
				}
			}

			$this->set('data', $data);
			$this->set('__serialize', 'data');
		}

		public function citas_reg_2111(){

			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');
						
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			
			$operador = $this->Session->read('operador');
			$this->Session->delete('operador');

			$this->set('fecha', date('Y-m-d'));
						
			
			$operador_citas = $this->RegLlamada->query("SELECT user_id , count(user_id) as amount FROM reg_llamadas WHERE created LIKE '%$anio%' GROUP BY user_id");                        
			$operadores = $this->User->find('all',array( 'fields'=>array('User.id', 'User.nombres', 'User.ap_paterno', 'User.ap_materno'), 'recursive' => 0 ));

			$data = array();

			foreach($operador_citas as $operador_cita){
				foreach($operadores as $operador){
					if($operador_cita['reg_llamadas']['user_id'] == $operador['User']['id']){
						array_push( $data, 
							array(
								 intval($operador['User']['id']),
								 intval($operador_cita[0]['amount']),
								$operador['User']['nombres']." ".$operador['User']['ap_paterno']." ".$operador['User']['ap_materno']
							)
						);
				   }
				}
			}

			$this->set('data', $data);

			$this->layout = "/bootstrap/pdf_layout";
		}
		
		//GRAFICO ESTADISTICO ANUAL POR OPERADORA
		public function citas_reg_2112(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$operador = $this->Session->read('operador');
			$this->Session->delete('operador');
			
			///CONTEO DE ATENCIONES POR MES EN EL AÑO DE UNA OPERADORA                                   
			$this->set('enero', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.user_id'=>$operador,'RegLlamada.created LIKE' => '%'.$anio.'-01%'))));
			$this->set('febrero', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.user_id'=>$operador,'RegLlamada.created LIKE' => '%'.$anio.'-02%'))));
			$this->set('marzo', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.user_id'=>$operador,'RegLlamada.created LIKE' => '%'.$anio.'-03%'))));
			$this->set('abril', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.user_id'=>$operador,'RegLlamada.created LIKE' => '%'.$anio.'-04%'))));
			$this->set('mayo', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.user_id'=>$operador,'RegLlamada.created LIKE' => '%'.$anio.'-05%'))));
			$this->set('junio', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.user_id'=>$operador,'RegLlamada.created LIKE' => '%'.$anio.'-06%'))));
			$this->set('julio', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.user_id'=>$operador,'RegLlamada.created LIKE' => '%'.$anio.'-07%'))));
			$this->set('agosto', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.user_id'=>$operador,'RegLlamada.created LIKE' => '%'.$anio.'-08%'))));
			$this->set('setiembre', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.user_id'=>$operador,'RegLlamada.created LIKE' => '%'.$anio.'-09%'))));
			$this->set('octubre', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.user_id'=>$operador,'RegLlamada.created LIKE' => '%'.$anio.'-10%'))));
			$this->set('noviembre', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.user_id'=>$operador,'RegLlamada.created LIKE' => "%$anio-11%"))));
			$this->set('diciembre', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.user_id'=>$operador,'RegLlamada.created LIKE' => "%$anio-12%"))));
			
			$this->set('operadores' ,$this->User->find('all',array(
														'fields'=>array(                                                                        
																		'User.nombres',
																		'User.ap_paterno',
																		'User.ap_materno'),
														'conditions'=>array(
																		'User.id'=>$operador),
														'recursive'=>0)
										));
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		//GRAFICO ESTADISTICO MENSUAL DE TODAS LAS OPERADORAS                                
		public function citas_reg_2121(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$operador = $this->Session->read('operador');
			$this->Session->delete('operador');
			
			if($mes == "01"){ $this->set('mes','Enero');}
			if($mes == "02"){ $this->set('mes','Febrero');}
			if($mes == "03"){ $this->set('mes','Marzo');}
			if($mes == "04"){ $this->set('mes','Abril');}
			if($mes == "05"){ $this->set('mes','Mayo');}
			if($mes == "06"){ $this->set('mes','Junio');}
			if($mes == "07"){ $this->set('mes','Julio');}
			if($mes == "08"){ $this->set('mes','Agosto');}
			if($mes == "09"){ $this->set('mes','Setiembre');}
			if($mes == "10"){ $this->set('mes','Octubre');}
			if($mes == "11"){ $this->set('mes','Noviembre');}
			if($mes == "12"){ $this->set('mes','Diciembre');}           
			
			$this->set('operador_citas', $this->RegLlamada->query("SELECT user_id ,count(user_id) FROM reg_llamadas WHERE created LIKE '%$anio-$mes%' GROUP BY user_id"));
						
			$this->set('operadores' ,$this->User->find('all',array(
														'fields'=>array(
																		'User.id',
																		'User.nombres',
																		'User.ap_paterno',
																		'User.ap_materno'),
														'recursive'=>0)
										));
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		//GRAFICO ESTADISTICO MENSUAL DE UNA OPERADORA
		public function citas_reg_2122(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$operador = $this->Session->read('operador');
			$this->Session->delete('operador');
			
			if($mes == "01"){ $this->set('mes','Enero');}
			if($mes == "02"){ $this->set('mes','Febrero');}
			if($mes == "03"){ $this->set('mes','Marzo');}
			if($mes == "04"){ $this->set('mes','Abril');}
			if($mes == "05"){ $this->set('mes','Mayo');}
			if($mes == "06"){ $this->set('mes','Junio');}
			if($mes == "07"){ $this->set('mes','Julio');}
			if($mes == "08"){ $this->set('mes','Agosto');}
			if($mes == "09"){ $this->set('mes','Setiembre');}
			if($mes == "10"){ $this->set('mes','Octubre');}
			if($mes == "11"){ $this->set('mes','Noviembre');}
			if($mes == "12"){ $this->set('mes','Diciembre');}
			
			///CONTEO DE ATENCIONES POR MES EN EL AÑO DE UNA OPERADORA                                   
			$this->set('citas_operador', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.user_id'=>$operador,'RegLlamada.created LIKE' => "%$anio-$mes%"))));
			
			$this->set('operadores' ,$this->User->find('all',array(
														'fields'=>array(                                                                        
																		'User.nombres',
																		'User.ap_paterno',
																		'User.ap_materno'),
														'conditions'=>array(
																		'User.id'=>$operador),
														'recursive'=>0)
										));            
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		//LISTADO ANUAL DE TODAS LAS OPERADORAS                                
		public function citas_reg_2211(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$operador = $this->Session->read('operador');
			$this->Session->delete('operador');
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		//LISTADO ANUAL POR OPERADORA
		public function citas_reg_2212(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$operador = $this->Session->read('operador');
			$this->Session->delete('operador');
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		//LISTADO MENSUAL DE TODAS LAS OPERADORAS                                
		public function citas_reg_2221(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$operador = $this->Session->read('operador');
			$this->Session->delete('operador');
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		//LISTADO MENSUAL POR OPERADORA
		public function citas_reg_2222(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$operador = $this->Session->read('operador');
			$this->Session->delete('operador');
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		//FIN REPORTES OPERADOR
									  
								
		//INICIO REPORTES CAS
		
		//GRAFICO ESTADISTICO ANUAL DE TODAS LAS ESPECIALIDADES DEL CAS        
		public function citas_reg_3111(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$cas = $this->Session->read('cas');
			$this->Session->delete('cas');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			$this->set('especialidades_cas', $this->RegLlamada->query("SELECT ca_id ,count(ca_id) FROM reg_llamadas WHERE cacreated LIKE '%$anio%' GROUP BY ca_id"));
					   
										
			$this->set('cas' ,$this->Ca->find('all',array(
														'fields'=>array(                                                                        
																		'Ca.cas'),
														'conditions'=>array(
																		'Ca.id'=>$cas),
														'recursive'=>0)
										));
			
			$this->set('especialidades' ,$this->Especialidade->find('all',array(
														'fields'=>array(                                                                        
																		'Especialidade.especialidad'),
														'conditions'=>array(
																		'Especialidade.id'=>$espec),
														'recursive'=>0)
										));
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		//GRAFICO ESTADISTICO ANUAL POR ESPECIALIDAD DEL CAS        
		public function citas_reg_3112(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$cas = $this->Session->read('cas');
			$this->Session->delete('cas');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			///CONTEO DE ATENCIONES POR MES EN EL AÑO DE UNA OPERADORA                                   
			$this->set('enero', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.ca_id'=>$cas,'Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-01%'))));
			$this->set('febrero', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.ca_id'=>$cas,'Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-02%'))));
			$this->set('marzo', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.ca_id'=>$cas,'Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-03%'))));
			$this->set('abril', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.ca_id'=>$cas,'Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-04%'))));
			$this->set('mayo', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.ca_id'=>$cas,'Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-05%'))));
			$this->set('junio', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.ca_id'=>$cas,'Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-06%'))));
			$this->set('julio', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.ca_id'=>$cas,'Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-07%'))));
			$this->set('agosto', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.ca_id'=>$cas,'Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-08%'))));
			$this->set('setiembre', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.ca_id'=>$cas,'Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-09%'))));
			$this->set('octubre', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.ca_id'=>$cas,'Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-10%'))));
			$this->set('noviembre', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.ca_id'=>$cas,'Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => "%$anio-11%"))));
			$this->set('diciembre', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.ca_id'=>$cas,'Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => "%$anio-12%"))));
			
			$this->set('cas' ,$this->Ca->find('all',array(
														'fields'=>array(                                                                        
																		'Ca.cas'),
														'conditions'=>array(
																		'Ca.id'=>$cas),
														'recursive'=>0)
										));
			
			$this->set('especialidades' ,$this->Especialidade->find('all',array(
														'fields'=>array(                                                                        
																		'Especialidade.especialidad'),
														'conditions'=>array(
																		'Especialidade.id'=>$espec),
														'recursive'=>0)
										));
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		//GRAFICO ESTADISTICO MENSUAL DE TODAS LAS ESPECIALIDADES DEL CAS
		public function citas_reg_3121(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$cas = $this->Session->read('cas');
			$this->Session->delete('cas');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			
			if($mes == "01"){ $this->set('mes','Enero');}
			if($mes == "02"){ $this->set('mes','Febrero');}
			if($mes == "03"){ $this->set('mes','Marzo');}
			if($mes == "04"){ $this->set('mes','Abril');}
			if($mes == "05"){ $this->set('mes','Mayo');}
			if($mes == "06"){ $this->set('mes','Junio');}
			if($mes == "07"){ $this->set('mes','Julio');}
			if($mes == "08"){ $this->set('mes','Agosto');}
			if($mes == "09"){ $this->set('mes','Setiembre');}
			if($mes == "10"){ $this->set('mes','Octubre');}
			if($mes == "11"){ $this->set('mes','Noviembre');}
			if($mes == "12"){ $this->set('mes','Diciembre');}           
			
			$this->set('especialidades_cas', $this->RegLlamada->query("SELECT ca_id ,count(ca_id) FROM reg_llamadas WHERE created LIKE '%$anio-$mes%' GROUP BY ca_id"));
						
			$this->set('cas' ,$this->Ca->find('all',array(
														'fields'=>array(
																		'Ca.id',
																		'Ca.cas'),
														'recursive'=>0)
										));
			
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		
		//GRAFICO ESTADISTICO MENSUAL POR ESPECIALIDAD DEL CAS
		public function citas_reg_3122(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$cas = $this->Session->read('cas');
			$this->Session->delete('cas');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			if($mes == "01"){ $this->set('mes','Enero');}
			if($mes == "02"){ $this->set('mes','Febrero');}
			if($mes == "03"){ $this->set('mes','Marzo');}
			if($mes == "04"){ $this->set('mes','Abril');}
			if($mes == "05"){ $this->set('mes','Mayo');}
			if($mes == "06"){ $this->set('mes','Junio');}
			if($mes == "07"){ $this->set('mes','Julio');}
			if($mes == "08"){ $this->set('mes','Agosto');}
			if($mes == "09"){ $this->set('mes','Setiembre');}
			if($mes == "10"){ $this->set('mes','Octubre');}
			if($mes == "11"){ $this->set('mes','Noviembre');}
			if($mes == "12"){ $this->set('mes','Diciembre');}
			
			$this->set('especialidad_cas', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.ca_id'=>$cas,'Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => "%$anio-$mes%"))));                                   
			
			$this->set('cas' ,$this->Ca->find('all',array(
														'fields'=>array(                                                                        
																		'Ca.cas'),
														'conditions'=>array(
																		'Ca.id'=>$cas),
														'recursive'=>0)
										));
			
			$this->set('especialidades' ,$this->Especialidade->find('all',array(
														'fields'=>array(                                                                        
																		'Especialidade.especialidad'),
														'conditions'=>array(
																		'Especialidade.id'=>$espec),
														'recursive'=>0)
										));
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		
		//LISTADO ANUAL DE TODAS LAS ESPECIALIDADES DEL CAS
		public function citas_reg_3211(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$cas = $this->Session->read('cas');
			$this->Session->delete('cas');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		
		//LISTADO ANUAL POR ESPECIALIDAD DEL CAS
		public function citas_reg_3212(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$cas = $this->Session->read('cas');
			$this->Session->delete('cas');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		
		//LISTADO MENSUAL DE TODAS LAS ESPECIALIDADES DEL CAS
		public function citas_reg_3221(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$cas = $this->Session->read('cas');
			$this->Session->delete('cas');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		
		//LISTADO MENSUAL POR ESPECIALIDAD DEL CAS 
		public function citas_reg_3222(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$cas = $this->Session->read('cas');
			$this->Session->delete('cas');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		//FIN REPORTES CAS
		
		//INICIO REPORTES ESPECIALIDAD
		
		//GRAFICO ESTADISTICO ANUAL DE TODAS LAS ESPECIALIDADES
		public function citas_reg_4111(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			$this->set('tot_especialidades', $this->RegLlamada->query("SELECT especialidade_id ,count(especialidade_id) FROM reg_llamadas WHERE created LIKE '%$anio%' GROUP BY especialidade_id"));
						
			$this->set('especialidads' ,$this->Especialidade->find('all',array(
														'fields'=>array(
																		'Especialidade.id',
																		'Especialidade.especialidad'),
														'recursive'=>0)
										));
						
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		//GRAFICO ESTADISTICO ANUAL POR ESPECIALIDAD        
		public function citas_reg_4112(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			///CONTEO DE ATENCIONES POR MES EN EL AÑO DE UNA ESPECIALIDAD                                   
			$this->set('enero', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-01%'))));
			$this->set('febrero', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-02%'))));
			$this->set('marzo', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-03%'))));
			$this->set('abril', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-04%'))));
			$this->set('mayo', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-05%'))));
			$this->set('junio', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-06%'))));
			$this->set('julio', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-07%'))));
			$this->set('agosto', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-08%'))));
			$this->set('setiembre', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-09%'))));
			$this->set('octubre', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => '%'.$anio.'-10%'))));
			$this->set('noviembre', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => "%$anio-11%"))));
			$this->set('diciembre', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => "%$anio-12%"))));
			
			$this->set('especialidades' ,$this->Especialidade->find('all',array(
														'fields'=>array(                                                                        
																		'Especialidade.code',
																		'Especialidade.especialidad'),
														'conditions'=>array(
																		'Especialidade.id'=>$espec),
														'recursive'=>0)
										));
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		//GRAFICO ESTADISTICO MENSUAL DE TODAS LAS ESPECIALIDADES
		public function citas_reg_4121(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			if($mes == "01"){ $this->set('mes','Enero');}
			if($mes == "02"){ $this->set('mes','Febrero');}
			if($mes == "03"){ $this->set('mes','Marzo');}
			if($mes == "04"){ $this->set('mes','Abril');}
			if($mes == "05"){ $this->set('mes','Mayo');}
			if($mes == "06"){ $this->set('mes','Junio');}
			if($mes == "07"){ $this->set('mes','Julio');}
			if($mes == "08"){ $this->set('mes','Agosto');}
			if($mes == "09"){ $this->set('mes','Setiembre');}
			if($mes == "10"){ $this->set('mes','Octubre');}
			if($mes == "11"){ $this->set('mes','Noviembre');}
			if($mes == "12"){ $this->set('mes','Diciembre');}           
			
			$this->set('tot_especialidades', $this->RegLlamada->query("SELECT especialidade_id ,count(especialidade_id) FROM reg_llamadas WHERE created LIKE '%$anio-$mes%' GROUP BY especialidade_id"));
						
			$this->set('especialidads' ,$this->Especialidade->find('all',array(
														'fields'=>array(
																		'Especialidade.id',
																		'Especialidade.especialidad'),
														'recursive'=>0)
										));
									
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		//GRAFICO ESTADISTICO MENSUAL POR ESPECIALIDAD
		public function citas_reg_4122(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			if($mes == "01"){ $this->set('mes','Enero');}
			if($mes == "02"){ $this->set('mes','Febrero');}
			if($mes == "03"){ $this->set('mes','Marzo');}
			if($mes == "04"){ $this->set('mes','Abril');}
			if($mes == "05"){ $this->set('mes','Mayo');}
			if($mes == "06"){ $this->set('mes','Junio');}
			if($mes == "07"){ $this->set('mes','Julio');}
			if($mes == "08"){ $this->set('mes','Agosto');}
			if($mes == "09"){ $this->set('mes','Setiembre');}
			if($mes == "10"){ $this->set('mes','Octubre');}
			if($mes == "11"){ $this->set('mes','Noviembre');}
			if($mes == "12"){ $this->set('mes','Diciembre');}
			
			///CONTEO DE ATENCIONES POR MES EN EL AÑO DE UNA ESPECIALIDAD
			$this->set('especialidades_mes', $this->RegLlamada->find('count', array('conditions' => array('Regllamada.especialidade_id'=>$espec,'RegLlamada.created LIKE' => "%$anio-$mes%"))));                                   
			
			$this->set('especialidades' ,$this->Especialidade->find('all',array(
														'fields'=>array(                                                                        
																		'Especialidade.code',
																		'Especialidade.especialidad'),
														'conditions'=>array(
																		'Especialidade.id'=>$espec),
														'recursive'=>0)
										));
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		//LISTADO ANUAL DE TODAS LAS ESPECIALIDADES
		public function citas_reg_4211(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		//LISTADO ANUAL POR ESPECIALIDAD
		public function citas_reg_4212(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		
		//LISTADO MENSUAL DE TODAS LAS ESPECIALIDADES
		public function citas_reg_4221(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
				
		//LISTADO MENSUAL POR ESPECIALIDAD
		public function citas_reg_4222(){
			$anio = $this->Session->read('anio');
			$this->Session->delete('anio');            
			$mes = $this->Session->read('mes');
			$this->Session->delete('mes');
			$espec = $this->Session->read('especialidad');
			$this->Session->delete('especialidad');
			
			$this->layout = 'pdf'; //this will use the pdf.ctp layout 
			$this->response->type('pdf');
		}
		//FIN REPORTES ESPECIALIDAD
		
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
		
	}
	
?>