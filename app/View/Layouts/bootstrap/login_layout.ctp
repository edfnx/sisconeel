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
			</div>
		</div><!-- /navbar-inner -->
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
