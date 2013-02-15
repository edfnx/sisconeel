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

$cakeDescription = __d('SISCONEEL', 'EsSalud - SISCONEEL: Sistema de Control de EsSalud en Linea');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
        echo $this->Javascript->link(array( 'jquery-1.8.2.min.js',
                                            'jquery-ui-1.8.4.custom.min.js',
                                            'jquery.autocomplete.min.js',
                                            'jquery.jeditable.mini.js',
                                            '/plugins/dataTables/jquery.dataTables.min.js',
                                            'main.js'
                                            ));
	
         echo $this->Html->css(array('/plugins/dataTables/jquery.dataTables','main'));
    ?>
</head>
<body>
	<div id="container">
		<div class="navbar-inner">
			<h4 class="titlecolor" ><?php echo $cakeDescription; ?></h4>
		</div>
		<div id="content">             
            <div id="menu" style="width: 18%; height: 620px; margin-left: 0%; float: left; text-align: center;">
                <ul style="list-style-type: none;">
                    <li style="color: white; font-size: x-large; font-weight: bold; background-color: #2375F1;">MENU</li>                    
                    <li style=" color: white; font-size: medium; font-weight: bold; background-color: #2375F1; margin-top: 10px; margin-bottom: 1px;">LLAMADAS</li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Registrar Citas', array('controller'=>'Llamadas','action'=>'registrar'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Confirmar Citas', array('controller'=>'llamadas','action'=>'confirmar'),array('class' => 'menus'));
                        ?>
                    </li>                    
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Eliminar Citas', array('controller'=>'llamadas','action'=>'eliminar'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Citas Otorgadas', array('controller'=>'llamadas','action'=>'index_otorg'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Citas No Otorgads', array('controller'=>'llamadas','action'=>'index_no_otorg'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Citas Confirmadas', array('controller'=>'llamadas','action'=>'index_conf'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Citas Eliminadas', array('controller'=>'llamadas','action'=>'index_elim'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="color: white; font-size: medium; font-weight: bold; background-color: #2375F1; margin-top: 10px; margin-bottom: 1px;">REPORTES</li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Citas Registradas', array('controller'=>'reportes','action'=>'citas_reg'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Citas Otorgadas', array('controller'=>'reportes','action'=>'citas_otorg'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Citas Confirmadas', array('controller'=>'reportes','action'=>'citas_conf'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Citas Eliminadas', array('controller'=>'reportes','action'=>'citas_elim'),array('class' => 'menus'));
                        ?>
                    </li>                    
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Acceso', array('controller'=>'reportes','action'=>'acceso'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="color: white; font-size: small; font-weight: bold; background-color: #2375F1; margin-top: 10px; margin-bottom: 1px;">PANEL DE CONTROL</li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('CAS', array('controller'=>'Panels','action'=>'cas'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Medicos', array('controller'=>'Panels','action'=>'medicos'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Observ Llamada', array('controller'=>'Panels','action'=>'observaciones'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Respuesta Confirm', array('controller'=>'Panels','action'=>'respuestas'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Relacion Familiar', array('controller'=>'Panels','action'=>'relaciones'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Usuarios', array('controller'=>'Users','action'=>'index'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="color: white; font-size: small; font-weight: bold; background-color: #2375F1; margin-top: 10px; margin-bottom: 1px;">AYUDA</li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Acerca de', array('controller'=>'Panels','action'=>'about'),array('class' => 'menus'));
                        ?>
                    </li>
                    <li style="background-color: #67A4FF; margin-bottom: 1px;">
                        <?php
                            echo $this->html->link('Licencia', array('controller'=>'Panels','action'=>'licencia'),array('class' => 'menus'));
                        ?>
                    </li>
                </ul>                
            </div>
            <div id="mainbody" style="width: 82%; margin-left: 0%; float: left; text-align: center;">
                <div id="operadorinfo" style="height: 33px; text-align: center; font-size: large; font-size: medium;">
                    <div style="margin-left: 0%; float: left; text-align: center;">
                        <ul style="list-style-type: none;">
                            <li style="float: left;">USUARIO:</li>
                            <li style="float: left; margin-left: 0%; margin-right: 30px;">
                                <?php                    
                                    echo $current_user['nombres']." ".$current_user['ap_paterno']." ".$current_user['ap_materno'];
                                ?>
                            </li>
                            <li style="float: left;">CABINA:</li>
                            <li style="float: left; margin-left: 0px;  margin-right: 30px;">
                                <?php                    
                                    echo $this->Session->read('cabina');
                                ?>
                            </li>
                            <li style="float: left;">TURNO:</li>
                            <li style="float: left; margin-left: 0px;">
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
                    </div>
                    <div style="margin-right: 0%; float: right; text-align: center;">
                        <?php         
                            echo $this->Html->link("Cerrar Session",
                                                   array('controller'=>'users', 'action'=>'logout'),
                                                   array('class' => 'button medium blue')
                                                   );
                        ?>
                    </div>
                </div>        
                <div id="flash" style="height: 50px; text-align: center;">
                    <?php echo $this->Session->flash(); ?>
                </div>
                <div id="contentbody">
                    <?php echo $this->fetch('content'); ?>                    
                </div>
            </div>
            <div style="clear:both"></div>            	
		</div>
		<div style="text-align: center;" id="footer">
			SISCONEEL - Copyright &copy; Oficina de Soporte Informatico RAJUL - WECHLL - EsSalud 2013 
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
    
    <?php
        //echo $this->Javascript->link(array('../plugins/dataTables/.dataTables.min'));
    ?>
    
</body>
</html>
