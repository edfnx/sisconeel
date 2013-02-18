<?php
/**
* AutocompleteControlle : Controlador de Autocompletes
*/
class AutocompletesController  extends AppController
{
	public $uses = array('Especialidade');

	public function specialties()
	{
		$this->viewClass = 'Json';
		$this->RequestHandler->setContent('json', 'application/json' );

		// Inicio de Consulta

		$id = $this->data['id'];
		$this->Session->write('cas', $id);

		$specialties = $this->Especialidade->find('all',
				array(
					'fields'=>array('Especialidade.id','Especialidade.especialidad'),
					'conditions'=>array('Especialidade.ca_id'=>$id)
				)
			);

		// Final de consulta

		// Inicio de Array Data
		$data = array();

		foreach ($specialties as $key => $specialty) {
			$data[$key] = array(
				'id' => $specialty['Especialidade']['id'],
				'name' => $specialty['Especialidade']['especialidad']			
			);
		}
		// Final de Array Data


		$this->set('data', $data);
		$this->set('__serialize', 'data');
	}



	public function doctors(){

		$this->loadModel('Medico');

		$this->viewClass = 'Json';
		$this->RequestHandler->setContent('json', 'application/json' );

		// Inicio de Consulta

		$casId = $this->Session->read('cas');
		//$this->Session->delete('cas');
		$specialtyId = $this->data['id'];

		$doctors = $this->Medico->find('all',
			array(
				'fields'=>array('Medico.id','Medico.medico'),
				'conditions'=>array('Medico.ca_id'=>$casId,'Medico.especialidade_id'=>$specialtyId)
			)
		);

		// Final de consulta

		// Inicio de Array Data
		$data = array();

		foreach ($doctors as $key => $doctor) {
			$data[$key] = array(
				'id' => $doctor['Medico']['id'],
				'name' => $doctor['Medico']['medico']			
			);
		}
		// Final de Array Data


		$this->set('data', $data);
		$this->set('__serialize', 'data');

	}

}
?>