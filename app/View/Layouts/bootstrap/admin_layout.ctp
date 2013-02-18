<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('SISCONEEL', 'EsSalud - SISCONEEL');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>

	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('/bootstrap-cerulean/css/bootstrap');
		echo $this->Html->css('/bootstrap-cerulean/css/bootswatch');
		echo $this->Html->css('/bootstrap-cerulean/css/bootstrap-responsive');
		echo $this->Html->css('/theme/css/master.css');

		
		echo $this->Html->script('/plugins/jquery/jquery-1.8.2.min');
		echo $this->Html->script('/bootstrap-cerulean/js/bootstrap.min');
		echo $this->Html->script('/plugins/jquery.jeditable.mini.js');

		/* 'main.js' */

		// Data table 
		
		echo $this->Html->script('/plugins/dataTables/jquery.dataTables.min.js');
		echo $this->Html->css('/plugins/dataTables/jquery.dataTables');

		echo $this->Html->script('/plugins/flot/jquery.flot');
		echo $this->Html->script('/plugins/flot/jquery.flot.categories');
		echo $this->Html->script('/theme/js/main');
		echo $this->Html->script('/theme/js/nesting-select');
		
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
	?>
</head>
<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner ">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#"><?php echo $cakeDescription; ?></a>
				<div class="nav-collapse">
					<ul class="nav">						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Citas<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<?php echo $this->html->link('Registrar', array('controller'=>'Llamadas','action'=>'registrar')); ?>
								</li>
								<li>
									<?php echo $this->html->link('Confirmar', array('controller'=>'llamadas','action'=>'confirmar')); ?>
								</li>                    
								<li>
									<?php echo $this->html->link('Eliminar', array('controller'=>'llamadas','action'=>'eliminar')); ?>
								</li>
								<li class="divider"></li>
								<li>
									<?php echo $this->html->link('Otorgadas', array('controller'=>'llamadas','action'=>'index_otorg')); ?>
								</li>
								<li>
									<?php echo $this->html->link('No Otorgads', array('controller'=>'llamadas','action'=>'index_no_otorg')); ?>
								</li>
								<li>
									<?php echo $this->html->link('Confirmadas', array('controller'=>'llamadas','action'=>'index_conf')); ?>
								</li>
								<li>
									<?php echo $this->html->link('Eliminadas', array('controller'=>'llamadas','action'=>'index_elim')); ?>
								</li>								
								
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reporte<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li class="nav-header">De Citas</li>
								<li class="divider"></li>
								<li>
									<?php echo $this->html->link('Registradas', array('controller'=>'reportes','action'=>'citas_reg')); ?>
								</li>
								<li>
									<?php echo $this->html->link('Otorgadas', array('controller'=>'reportes','action'=>'citas_otorg')); ?>
								</li>
								<li>
									<?php echo $this->html->link('Confirmadas', array('controller'=>'reportes','action'=>'citas_conf')); ?>
								</li>
								<li>
									<?php echo $this->html->link('Eliminadas', array('controller'=>'reportes','action'=>'citas_elim')); ?>
								</li>                    
								<li>
									<?php echo $this->html->link('Acceso', array('controller'=>'reportes','action'=>'acceso')); ?>
								</li>								
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Panel de Control<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<?php echo $this->html->link('CAS', array('controller'=>'Panels','action'=>'cas')); ?>
								</li>
								<li>
									<?php echo $this->html->link('Especialidades', array('controller'=>'Panels','action'=>'especialidades')); ?>
								</li>
                                <li>
									<?php echo $this->html->link('Medicos', array('controller'=>'Panels','action'=>'medicos')); ?>
								</li>
								<li>
									<?php echo $this->html->link('Observ Llamada', array('controller'=>'Panels','action'=>'observaciones')); ?>
								</li>
								<li>
									<?php echo $this->html->link('Respuesta Confirm', array('controller'=>'Panels','action'=>'respuestas')); ?>
								</li>
								<li>
									<?php echo $this->html->link('Relacion Familiar', array('controller'=>'Panels','action'=>'relaciones')); ?>
								</li>
								<li>
									<?php echo $this->html->link('Usuarios', array('controller'=>'Users','action'=>'index')); ?>
								</li>								
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Ayuda<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<?php echo $this->html->link('Acerca de', array('controller'=>'Panels','action'=>'about')); ?>
								</li>
								<li>
									<?php echo $this->html->link('Licencia', array('controller'=>'Panels','action'=>'licencia')); ?>
								</li>								
							</ul>
						</li>
					</ul>
					<ul class="nav pull-right">
						<li><a href="#">Link</a></li>
						<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php echo $current_user['nombres']." ".$current_user['ap_paterno']." ".$current_user['ap_materno'];	?>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li>
									<?php  echo $this->Html->link("Cerrar Session",  array('controller'=>'users', 'action'=>'logout')); ?>
								</li>								
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div>

	<div class="ss-subnav ss-subnav-fixed">
		<div class="container">

			<ul class="ss-nav">
				<li> 
				
					CABINA:
					<?php echo $this->Session->read('cabina'); ?>
				
				</li>
				<li class="separtor"></li>
				<li>
					TURNO:
					<?php
						$turno = $this->Session->read('turno');

						if($turno == "manana"){
							echo "Ma&ntilde;ana";
						}else if($turno == "tarde"){
							echo "Tarde"; 
						}else{
							echo "Apoyo";
						}
					?>
				</li>
			</ul>

			<div class="fix-right">
			
				<ul class="ss-nav">
					<li> 
						CABINA:
						<?php echo $this->Session->read('cabina'); ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<section class="main">
		<div class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>				
		</div>
	</section>
	<footer class="main-footer">
		<p>
			SISCONEEL - Copyright &copy; Oficina de Soporte Informatico RAJUL - WECHLL - EsSalud 2013 
		</p>
	</footer>
		<?php echo $this->element('sql_dump'); ?>
</body>
</html>