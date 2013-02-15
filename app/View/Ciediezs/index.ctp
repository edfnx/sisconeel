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
 * @package       Cake.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/* 
if (Configure::read('debug') == 0):
	throw new NotFoundException();
endif;
App::uses('Debugger', 'Utility');*/
?>
<!--
<iframe src="http://cakephp.org/bake-banner" width="830" height="160" style="overflow:hidden; border:none;">
	<p>For updates and important announcements, visit http://cakefest.org</p>
</iframe>
-->
<h2>Busqueda de Diagnosticos de CIE10</h2>

<table>
    <tr>
        <td style="width: 300px;">
            <h3>Por Codigo CIE10</h3>
            
                <?php echo $this->form->create('cdiag', array('id' => 'cdiag')); ?>
                
                <?php echo $this->form->input(
            				'Ciediez.cdiag',
                            array(
                            'label'=>false
                            )
                            ); ?>
                
                <?php echo $this->Form->end('Buscar Codigo'); ?>
            
            <h3>Por Descripcion</h3>
            
                <?php echo $this->form->create('ddiag', array('id' => 'ddiag')); ?>
                
                <?php echo $this->form->input(
            				'Ciediez.ddiag',
                            array(
                            'label'=>false
                            )
                            ); ?>
                
                <?php echo $this->Form->end('Buscar Descripcion'); ?>
            
            <!--
            <h3><?php //echo __d('cake_dev', 'Por Descripcion'); ?></h3>
            -->
        </td>
        <td>
            <p>
                
                <h2>CONCORDANCIAS ENCONTRADAS</h2>
            
                <?php if(empty($diagnosticos)){ ?>
                            Realize una Busqueda
                <?php } else { ?>
                <table style="font-size: smaller;">
                    <tr>
                        <td><b>Num</b></td>
                        <td><b>Codigo</b></td>
                        <td><b>Descripcion</b></td>
                        <td><b>Capitulo</b></td>
                        <td><b>Nivel</b></td>
                        <td><b>Sexo</b></td>
                    </tr>
                    <?php $num = 1; ?>
                    <?php foreach ($diagnosticos as $diagnostico): ?>
                    <tr>
                        <td style="text-align: center;"><?php   echo $num; ?></td>
                        <td style="text-align: center;"><?php   echo $diagnostico['Ciediez']['ce_cdiag']; ?></td>
                        <td><?php   echo $diagnostico['Ciediez']['ce_ddiag']; ?></td>
                        <td style="text-align: center;"><?php   echo $diagnostico['Ciediez']['ce_raiz']; ?></td>
                        <td><?php   echo $diagnostico['Ciediez']['ce_nivel']; ?></td>
                        <td><?php   
                                    if($diagnostico['Ciediez']['ce_sexo']==0){
                                        echo "Femenino";
                                    }
                                    if($diagnostico['Ciediez']['ce_sexo']==1){
                                        echo "Masculino";
                                    }
                                    if($diagnostico['Ciediez']['ce_sexo']==2){
                                        echo "Ambos";
                                    } 
                            ?>
                        </td>
                    </tr>
                        
                    <?php $num=$num+1; ?>
                    <?php endforeach; ?>
                </table>
                
                <?php } ?>
                
            </p>
        </td>
    </tr>
</table>