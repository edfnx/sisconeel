<?php $this->set('title_for_layout','Registrar Cita'); ?>

<div class="row">
	<div class="span10 offset1">
		<div class="row-fluid">
			<div class="span4">
				<div class="ss-boxit">
					<b> &laquo; <?php echo $llamregstotalcab; ?> &raquo; </b> 
					Citas registradas Cabina <?php echo $this->Session->read('cabina'); ?>
				</div>
			</div>
			<div class="span4">
				<div class="ss-boxit">
					<b> &laquo; <?php echo $llamregstotaluser; ?> &raquo; </b> 
					Citas registradas por el/la operador(a)
				</div>
			</div>
			<div class="span4">
				<div class="ss-boxit">
					<b> &laquo; <?php echo $llamregscabuser; ?> &raquo; </b> 
					Citas registradas Cabina <?php echo $this->Session->read('cabina'); ?> por el/la operador(a)
				</div>
			</div>
		</div>	
	</div>
</div>

<div class="row">
	<div class="span12">
		<div class="page-header">
			<h2>Registrar Cita</h2> 
		</div>

		<div class="tabbable tabs-left">
			<ul class="nav nav-tabs">
                <li class="active"><a href="#lA" data-toggle="tab">Cita: Otorgada</a></li>
                <li class=""><a href="#lB" data-toggle="tab">Cita: No otorgada</a></li>
             </ul>
			<div class="tab-content">
				<div class="tab-pane active" id="lA">
					<div data-tip="Cita entregada ">
						<?php echo $this->BtForm->create('RegLlamada');  ?>
						<?php echo $this->Form->hidden('RegLlamada.turno', array('value'=>$this->Session->read('turno'))); ?>
						<?php echo $this->Form->hidden('RegLlamada.cabina', array('value'=>$this->Session->read('cabina'))); ?>
						
						<?php echo $this->BtForm->input('RegLlamada.dni_pac', 'DNI', array('required' => 'required')); ?>
						<?php echo $this->BtForm->input('RegLlamada.aps_nombs', 'Apellidos y Nombres'); ?>
						<?php echo $this->BtForm->input('RegLlamada.telefono', 'Telefono o Celular'); ?>
						
						

						<?php echo $this->BtForm->input('RegLlamada.ca_id', 'Centros Asistencial', 
							array(
								'empty' => '(Seleccione)',									
								'data-html-helper'=>'nesting-select',
								'data-next-select'=>'#specialist-f1',
								'data-url'=> $this->Html->url(
									array(
										'controller' =>'autocompletes',
									 	'action' => 'specialties')
									),
								'required' => 'required'
								)
							); 
						?>

						<?php echo $this->BtForm->input('RegLlamada.especialidade_id','Especialidad',
							array(
								'id' => 'specialist-f1',
								'empty' => '(Seleccione)',
								'disabled' => 'true',								
								
								'data-html-helper'=>'nesting-select',
								'data-next-select'=>'#doctors-f1',
								'data-url'=> $this->Html->url(
									array(
										'controller' =>'autocompletes',
									 	'action' => 'doctors')
									),
								'required' => 'required'
								)
						);?>

						<?php echo $this->BtForm->input('RegLlamada.medico_id','Medico',
							array(
								'id' => 'doctors-f1',
								'empty' => '(Seleccione)',
								'disabled' => 'true'
								)
						); ?>

						<?php echo $this->BtForm->input('RegLlamada.consultorio','Consultorio'); ?>
						<?php echo $this->BtForm->input('RegLlamada.acto_medico', 'Acto Medico', array('required' => 'required')); ?>
						
						<div class="control-group">
							<label class="control-label">
								Fecha Cita
							</label>
							<div class="controls cake-date" >
								<?php
									 echo $this->Form->dateTime('RegLlamada.fecha_cita',
										'YMD', '24',
										array('empty'=>null,
												'monthNames'=>array(
														null,
														'Enero', 'Febrero', 'Marzo',
														'Abril', 'Mayo', 'Junio',
														'Julio', 'Agosto', 'Setiembre',
														'Octubre', 'Noviembre', 'Diciembre'
													),
												'minYear'=>date('Y'),
												'maxYear'=>date('Y')+1,
												'value'=>date('Y-m-d 12:00:00', strtotime("+1 day"))
											)
										);
								?>

							</div>
						</div>
						
						<?php echo $this->BtForm->input('RegLlamada.llamada_observ_id', 'Observacion de la Cita');
						?>

						<div class="control-group">
							<label class="control-label">
								Relacion Familiar
							</label>
							<div class="controls">
								<select id="rel_fam" name="data[RegLlamada][rel_familiar_id]">
									<option>Seleccione Relacion</option>
									<?php
										foreach($relfamiliares as $relfamiliar):
										   $id = $relfamiliar['RelFamiliar']['id'];
										   $nombre = $relfamiliar['RelFamiliar']['relacion'];
										   if($id == 1){
												echo "<option value='$id' selected>$nombre</option>";
											}else{
												echo "<option value='$id'>$nombre</option>";   
											}
										endforeach;
									?>
								</select>
							</div>
						</div>

						<?php echo $this->Form->hidden('RegLlamada.cita_otorgada', array('value' => 1)); ?>
						<?php echo $this->Form->hidden('RegLlamada.user_id', array('value'=>$current_user['id'])); ?>
						<?php echo $this->Form->hidden('RegLlamada.user_mod', array('value'=>$current_user['id'])); ?>
						<?php echo $this->BtForm->submit('Registrar Llamada'); ?>
						<?php echo $this->Form->end() ?>
					</div>
				</div>
				<div class="tab-pane" id="lB">
					<div data-tip="Cita no entregada ">
						<?php echo $this->BtForm->create('RegLlamada');  ?>
						<?php echo $this->Form->hidden('RegLlamada.turno', array('value'=>$this->Session->read('turno'))); ?>
						<?php echo $this->Form->hidden('RegLlamada.cabina', array('value'=>$this->Session->read('cabina'))); ?>
						
						<?php echo $this->BtForm->input('RegLlamada.ca_id', 'Centros Asistencial', 
							array(
									'empty' => '(Seleccione)',
									'data-html-helper'=>'nesting-select',
									'data-next-select'=>'#specialist-f2',
									'data-url'=> $this->Html->url(
										array(
											'controller' =>'autocompletes',
										 	'action' => 'specialties'
										)
									)
								)
							); 
						?>

						<?php echo $this->BtForm->input('RegLlamada.especialidade_id','Especialidad',
							array(
								'id' => 'specialist-f2',
								'empty' => '(Seleccione)',
								'disabled' => 'true'
								)
						);?>

						<?php echo $this->BtForm->input('RegLlamada.llamada_observ_id', 'Observacion de la Cita');
						?>

						<?php echo $this->Form->hidden('RegLlamada.cita_otorgada', array('value' => 0)); ?>
						<?php echo $this->Form->hidden('RegLlamada.user_id', array('value'=>$current_user['id'])); ?>
						<?php echo $this->Form->hidden('RegLlamada.user_mod', array('value'=>$current_user['id'])); ?>                
						<?php echo $this->BtForm->submit('Registrar Llamada'); ?>
						<?php echo $this->Form->end() ?>
					</div>
				</div>
			</div>
		</div>

		
	</div>
</div>

