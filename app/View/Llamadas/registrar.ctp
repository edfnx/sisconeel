<?php $this->set('title_for_layout','Registrar Cita'); ?>

<div class="row">
	<div class="span10 offset1">
		<div class="row-fluid">
			<div class="span4">
				<div class="ss-boxit">
					<div class="amount"><?php echo $llamregstotalcab; ?></div>
					Citas registradas Cabina <?php echo $this->Session->read('cabina'); ?>
				</div>
			</div>
			<div class="span4">
				<div class="ss-boxit">
					<div class="amount"><?php echo $llamregstotaluser; ?></div>
					Citas registradas por el/la operador(a)
				</div>
			</div>
			<div class="span4">
				<div class="ss-boxit">
					<div class="amount"><?php echo $llamregscabuser; ?></div>					
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
		<div>
			<?php echo $this->BtForm->create();  ?>
			<?php echo $this->Form->hidden('RegLlamada.turno', array('value'=>$this->Session->read('turno'))); ?>
			<?php echo $this->Form->hidden('RegLlamada.cabina', array('value'=>$this->Session->read('cabina'))); ?>
			<?php echo $this->BtForm->input('RegLlamada.dni_pac', 'DNI'); ?>
			<?php echo $this->BtForm->input('RegLlamada.aps_nombs', 'Apellidos y Nombres'); ?>
			<?php echo $this->BtForm->input('RegLlamada.telefono', 'Telefono o Celular'); ?>
			
			<div class="control-group">
				<label class="control-label">
					Centro Asistencial
				</label>
				<div class="controls">
					<div id="divcas">
						<select id="casid" name="data[RegLlamada][ca_id]">
							<option>Seleccione CAS</option>
							<?php
							   foreach($cas as $ca):
								  $id = $ca['Ca']['id'];
								  $nombre = $ca['Ca']['cas'];
								  echo "<option value='$id'>$nombre</option>";
							   endforeach;
							?>
						</select>
						<?php
							echo $this->Ajax->observeField('casid',
													array(
															'url'=>array('action'=>'especialidades'),
															'update'=>'divespecialidad'
															));
						?>
					</div>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">
					Especialidad
				</label>
				<div class="controls">
					<div id="divespecialidad">
						<select id="especialidadid" name="data[Especialidad]" disabled="true">
							<option>Seleccione Especialidad</option>    				    
						</select>
					</div>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">
					Medico
				</label>
				<div class="controls">
					<div id="divmedico">
						<select id="medicoid" name="data[Medico]" disabled="true">
							<option>Seleccione Medico</option>    				    
						</select>
					</div>
				</div>
			</div>

			<?php echo $this->BtForm->input('RegLlamada.consultorio','Consultorio'); ?>
			<?php echo $this->BtForm->input('RegLlamada.acto_medico', 'Acto Medico'); ?>
			
			<div class="control-group">
				<label class="control-label">
					Fecha Cita
				</label>
				<div class="controls cake-date" >
					<?php
						 echo $this->Form->dateTime('RegLlamada.fecha_cita',
													'YMD',
													'24',
													array('empty'=>null,
															'monthNames'=>array(null,
																				'Enero',
																				'Febrero',
																				'Marzo',
																				'Abril',
																				'Mayo',
																				'Junio',
																				'Julio',
																				'Agosto',
																				'Setiembre',
																				'Octubre',
																				'Noviembre',
																				'Diciembre'
																				),
															'minYear'=>date('Y'),
															'maxYear'=>date('Y')+1,
															'value'=>date('Y-m-d 12:00:00', strtotime("+1 day"))
															//'label'=>'Fecha Cita'
															)
													
													);
					?>

				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">
					Cita Otorgada
				</label>
				<div class="controls">
					<?php       
						 echo $this->Form->select('RegLlamada.cita_otorgada',
													array('si'=>'Si','no'=>'No'),
													array('empty'=>false,'value'=>'si')
													);
													
					?>

				</div>
			</div>

			<div class="control-group">
				<label class="control-label">
					Observacion de la Cita
				</label>
				<div class="controls">
					<select id="obs" name="data[RegLlamada][llamada_observ_id]">
						<option>Seleccione Observacion</option>
						<?php
							foreach($observaciones as $observacion):
								$id = $observacion['LlamadaObserv']['id'];
								$nombre = $observacion['LlamadaObserv']['observacion'];
							   
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

			<?php echo $this->Form->hidden('RegLlamada.user_id', array('value'=>$current_user['id'])); ?>
			<?php echo $this->Form->hidden('RegLlamada.user_mod', array('value'=>$current_user['id'])); ?>                
			<?php echo $this->Form->end('Registrar Llamada') ?>
		</div>
	</div>
</div>
			
