<?php $this->set('title_for_layout','Confirmar Cita'); ?>

			Citas Confirmadas<br />Cabina <?php echo $this->Session->read('cabina'); ?>                        

			<?php  echo $llamconftotalcab; ?>
		
			Citas Confirmadas<br /> por el/la operador(a)                           
		
			<?php echo $llamconftotaluser; ?>
		
		   Citas Confirmadas Cabina <?php echo $this->Session->read('cabina'); ?><br />
			por el/la operador(a)
		
			<?php echo $llamconfcabuser; ?>
							
<div class="row">
	<div class="span12">
		<div class="page-header">
			<h2>Confirmar Cita</h2>
		</div>
						 
		<?php echo $this->BtForm->create(); ?>

		<?php echo $this->Form->hidden('ConfLlamada.turno', array('value'=>$this->Session->read('turno'))); ?>
		<?php echo $this->Form->hidden('ConfLlamada.cabina', array('value'=>$this->Session->read('cabina'))); ?>

		<div id="divcas">
			<?php echo $this->BtForm->input('ConfLlamada.reg_llamada_id', 'Cita por DNI',  array('empty' => 'Seleccione DNI')); ?>
			<?php echo $this->Ajax->observeField('llamadaid', array('url'=>array('action'=>'datos'), 'update'=>'divdatos')); ?>
		</div>
		
	   
		<label>
		Datos Personales
		</label>
		<div id="divdatos"></div> 

		<?php echo $this->BtForm->input('ConfLlamada.respuesta_id', 'Respuesta',  array('empty' => 'Selecione respuesta')); ?>		
		<?php echo $this->BtForm->input('ConfLlamada.datos_llamada', 'Persona que contesto', array('placeholder'=>'Nombres Apellidos del familiar')); ?> 
		<?php echo $this->BtForm->input('ConfLlamada.rel_familiar_id', 'Relacion Familiar'); ?>
		<?php echo $this->BtForm->input('ConfLlamada.observacion', 'Observacion'); ?>                                
		<?php echo $this->Form->hidden('ConfLlamada.user_id',array('value'=>$current_user['id'])); ?>                
		<?php echo $this->Form->end('Confirmar Llamada') ?>
	</div>
</div>

<pre>
	<?php print_r($relFamiliars)?>
</pre>