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
		echo $this->Html->css('/bootstrap-cerulean/css/bootstrap-responsive');
		echo $this->Html->css('/theme/css/master.css');

		
		echo $this->Html->script('/plugins/jquery/jquery-1.8.2.min');
		echo $this->Html->script('/bootstrap-cerulean/js/bootstrap.min');
		
		
		/*
		echo $this->Javascript->link(array( '',
											'jquery.jeditable.mini.js',
											'/plugins/dataTables/jquery.dataTables.min.js',
											'main.js'
											));
		*/
	
		echo $this->Html->css('/plugins/dataTables/jquery.dataTables');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
	?>
</head>
<body>
	<header class="header">
		<h4 class="titlecolor" ></h4>            
	</header>



	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner ">
			<div class="container" style="width: auto;">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#"><?php echo $cakeDescription; ?></a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Llamadas</a></li>
						<li><a href="#">Reportes</a></li>
						<li><a href="#">Panel de Control</a></li>
						<li><a href="#">Ayuda</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</li>
					</ul>
					<form class="navbar-search pull-left" action="">
						<input type="text" class="search-query span2" placeholder="Search">
					</form>
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
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div>


	<section class="main-container">
		<div class="row-fluid">
			<div class="span3">
				<ul class="main-menu" style="list-style-type: none;">
					<li>LLAMADAS</li>
					<li>
						<?php echo $this->html->link('Registrar Citas', array('controller'=>'Llamadas','action'=>'registrar')); ?>
					</li>
					<li>
						<?php echo $this->html->link('Confirmar Citas', array('controller'=>'llamadas','action'=>'confirmar')); ?>
					</li>                    
					<li>
						<?php echo $this->html->link('Eliminar Citas', array('controller'=>'llamadas','action'=>'eliminar')); ?>
					</li>
					<li>
						<?php echo $this->html->link('Citas Otorgadas', array('controller'=>'llamadas','action'=>'index_otorg')); ?>
					</li>
					<li>
						<?php echo $this->html->link('Citas No Otorgads', array('controller'=>'llamadas','action'=>'index_no_otorg')); ?>
					</li>
					<li>
						<?php echo $this->html->link('Citas Confirmadas', array('controller'=>'llamadas','action'=>'index_conf')); ?>
					</li>
					<li>
						<?php echo $this->html->link('Citas Eliminadas', array('controller'=>'llamadas','action'=>'index_elim')); ?>
					</li>
					<li >REPORTES</li>
					<li>
						<?php echo $this->html->link('Citas Registradas', array('controller'=>'reportes','action'=>'citas_reg'));
						?>
					</li>
					<li>
						<?php echo $this->html->link('Citas Otorgadas', array('controller'=>'reportes','action'=>'citas_otorg'));
						?>
					</li>
					<li>
						<?php echo $this->html->link('Citas Confirmadas', array('controller'=>'reportes','action'=>'citas_conf'));
						?>
					</li>
					<li>
						<?php echo $this->html->link('Citas Eliminadas', array('controller'=>'reportes','action'=>'citas_elim'));
						?>
					</li>                    
					<li>
						<?php echo $this->html->link('Acceso', array('controller'=>'reportes','action'=>'acceso'));
						?>
					</li>
					<li>PANEL DE CONTROL</li>
					<li>
						<?php echo $this->html->link('CAS', array('controller'=>'Panels','action'=>'cas'));
						?>
					</li>
					<li>
						<?php echo $this->html->link('Medicos', array('controller'=>'Panels','action'=>'medicos'));
						?>
					</li>
					<li>
						<?php
							echo $this->html->link('Observ Llamada', array('controller'=>'Panels','action'=>'observaciones'));
						?>
					</li>
					<li>
						<?php
							echo $this->html->link('Respuesta Confirm', array('controller'=>'Panels','action'=>'respuestas'));
						?>
					</li>
					<li>
						<?php
							echo $this->html->link('Relacion Familiar', array('controller'=>'Panels','action'=>'relaciones'));
						?>
					</li>
					<li>
						<?php
							echo $this->html->link('Usuarios', array('controller'=>'Users','action'=>'index'));
						?>
					</li>
					<li>AYUDA</li>
					<li>
						<?php
							echo $this->html->link('Acerca de', array('controller'=>'Panels','action'=>'about'));
						?>
					</li>
					<li>
						<?php
							echo $this->html->link('Licencia', array('controller'=>'Panels','action'=>'licencia'));
						?>
					</li>
				</ul>    
			</div>            
			<div class="span8">
				<ul>					
					<li>CABINA:</li>
					<li>
						<?php                    
							echo $this->Session->read('cabina');
						?>
					</li>
					<li>TURNO:</li>
					<li>
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
	
				
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>				
		</div>
	</section>
	<footer>
		SISCONEEL - Copyright &copy; Oficina de Soporte Informatico RAJUL - WECHLL - EsSalud 2013 
	</footer>
	
		<?php echo $this->element('sql_dump'); ?>
			
</body>
</html>


