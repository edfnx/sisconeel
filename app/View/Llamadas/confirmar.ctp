<?php $this->set('title_for_layout','Confirmar Cita'); ?>

<div class="row">
	<div class="span10 offset1">
		<div class="row-fluid">
			<div class="span4">
				<div class="ss-boxit">
					<div class="amount">
						<?php  echo $llamconftotalcab; ?>
					</div>
					Citas Confirmadas Cabina <?php echo $this->Session->read('cabina'); ?>                        
				</div>
			</div>
			<div class="span4">
				<div class="ss-boxit">
					<div class="amount">
						<?php echo $llamconftotaluser; ?>
					</div>
					Citas Confirmadas por el/la operador(a)
				</div>
			</div>
			<div class="span4">
				<div class="ss-boxit">
					<div class="amount">
						<?php echo $llamconfcabuser; ?>
					</div>					
	   					Citas Confirmadas Cabina <?php echo $this->Session->read('cabina'); ?> por el/la operador(a)
				</div>
			</div>
		</div>	
	</div>
</div>

<div class="row">
	<div class="span12">
		<div class="page-header">
			<h2>Confirmar Cita</h2>
		</div>
						 
		<?php echo $this->BtForm->create(); ?>

		<?php echo $this->Form->hidden('ConfLlamada.turno', array('value'=>$this->Session->read('turno'))); ?>
		<?php echo $this->Form->hidden('ConfLlamada.cabina', array('value'=>$this->Session->read('cabina'))); ?>
        
        <div id="divespec">            
			<?php echo $this->BtForm->input('ConfLlamada.reg_llamada_id', 'Cita por DNI',  array('empty' => 'Seleccione DNI')); ?>
			<?php echo $this->Ajax->observeField('ConfLlamadaRegLlamadaId', array('url'=>array('action'=>'datos'), 'update'=>'divdatos')); ?>
		</div>
        
		<div id="divcas">            
			<?php echo $this->BtForm->input('ConfLlamada.reg_llamada_id', 'Cita por DNI',  array('empty' => 'Seleccione DNI')); ?>
			<?php echo $this->Ajax->observeField('ConfLlamadaRegLlamadaId', array('url'=>array('action'=>'datos'), 'update'=>'divdatos')); ?>
		</div>
		
	   <div class="control-group">
			<label class="control-label">
				Datos Personales
			</label>
			<div class="controls">		
				<div id="divdatos"></div> 
			</div>
		</div>

		<?php echo $this->BtForm->input('ConfLlamada.respuesta_id', 'Respuesta',  array('empty' => 'Selecione respuesta')); ?>		
		<?php echo $this->BtForm->input('ConfLlamada.datos_llamada', 'Persona que contesto', array('placeholder'=>'Nombres Apellidos del familiar')); ?> 
		<?php echo $this->BtForm->input('ConfLlamada.rel_familiar_id', 'Relacion Familiar'); ?>
		<?php echo $this->BtForm->input('ConfLlamada.observacion', 'Observacion'); ?>                                
		<?php echo $this->Form->hidden('ConfLlamada.user_id',array('value'=>$current_user['id'])); ?>                
		<?php echo $this->Form->end('Confirmar Llamada') ?>
	</div>
</div>