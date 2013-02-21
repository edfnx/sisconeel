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
		echo $this->Html->css('/theme/css/graphic.css');



		echo $this->Html->script('/plugins/jquery/jquery-1.8.2.min');
		echo $this->Html->script('/bootstrap-cerulean/js/bootstrap.min');
		echo $this->Html->script('/plugins/jquery.jeditable.mini.js');

		/* 'main.js' */
		

		// Data table 
		echo $this->Html->script('/plugins/dataTables/jquery.dataTables.min.js');
		echo $this->Html->css('/plugins/dataTables/jquery.dataTables');

		echo $this->Html->script('/plugins/flot/jquery.flot');
		echo $this->Html->script('/plugins/flot/jquery.flot.categories');
		
		echo $this->Html->css('/theme/css/print.pdf');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
	?>
	<style type="text/css" media="print">
		/***  Imprimir Graficos  ***/
		.navbar, .subnav, footer.main-footer{
			display: none;
		}

		h4{
			font-size: 1em;
			text-align: center;			
		}

		.wrapper{
			margin: 0px;
			padding: 0px;
		}

		.header-pdf{
			color: rgb(9, 103, 232);
			padding: 10px 10px 0px 10px ;
		}

		.img-logo{
			width: 200px;
			float: left;
			padding: 0px 0 10px 0; 
		}
		.text-logo{
			padding: 0px 0  10px 0; 
			padding-left: 220px;
			font-weight: bold;
			font-size: 0.8em;
		}
		.footer-pdf{
			bottom: -10px;
			left: 0px;
			right: 0px;
			padding: 0;
			position: absolute; 
			font-size: 0.6em;
		}

		.footer-pdf p:last-child{
			text-align: center;
			margin-bottom: 0;
		}

		.footer-pdf hr{
			border-top: 1px solid #999;
			padding: 0;
			margin: 0;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span8 offset2">
				<div class="wrapper">
					<header class="header-pdf">
						<div class="img-logo">
							<?php echo $this->Html->image('/theme/img/essalud.jpg')?>
						</div>
						<div class="text-logo">
							RED ASISTENCIAL JULIACA - EsSalud En Linea<br>
							Sistema de Control de EsSalud en Linea<br>
							SYSCONEEL
						</div>
					</header>
					<section class="section-pdf">
							<?php echo $this->Session->flash(); ?>
							<?php echo $this->fetch('content'); ?>
					</section>
					<footer class="footer-pdf">
						<?php echo 'USUARIO: '. $current_user['nombres'].' '.$current_user['ap_paterno'].' '.$current_user['ap_materno'] .' // FECHA:'.date('Y-m-d H:i:s').' // IP:'.$_SERVER['REMOTE_ADDR']; ?>
						<div class="pull-right">
        					<?php echo 'Pag. [ 1 de 1 ]'; ?>
						</div>
						<hr>
						<p>RAJUL - OFICINA DE SOPORTE INFORMATICO - WECHLL © Copyright 2013 - Derechos Reservados.</p>
					</footer>
				</div>
				
				<?php echo $this->element('sql_dump'); ?>
			</div>
		</div>
	</div>
</body>
</html>