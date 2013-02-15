<?php
    /*-----------------------------------------*/
    /*  Bootstrap BtForm Module Css  v 1.0  */
    /*-----------------------------------------*/
    
    App::uses('AppHelper', 'View/Helper');

    class SuprFormHelper extends AppHelper {
        public $helpers = array('Html', 'Form');

        public function input($name, $label = null, $options = array()) {
            // Use the HTML helper to output
            $h_label = '';
            
            // default options:
            $options['label'] = false;
        	$options['div'] = false;
            $options['required'] = 'required';
            
            $options['class'] = 'span9';

/*
<div class="form-row row-fluid">
    <div class="span12">
            <div class="row-fluid">
                    <label class="form-label span3" for="required">Paciente</label>
                    <?php echo $this->form->input( 'Medicamento.precio', array( 'label'=>false, 'class'=> "span9")); ?>
            </div>
    </div>
</div>
*/

            if (empty($label)) {
            	$h_label = '';
            }else{
            	$h_label = '<label class="form-label span3" for="required">' . $label . '</label>';
            }

            $input = $this->Form->input($name, $options);

            $html  = '<div class="form-row row-fluid"><div class="span12">';
            $html .= '<div class="row-fluid">';
            $html .= $h_label;
            $html .= $input;
            $html .= '</div>';
            $html .= '</div></div>';

            return  $html;
        }

        public function date($name, $label = null, $options = array()) {
            // Use the HTML helper to output
            $h_label = '';
            
            // default options:
            $options['label'] = false;
            $options['div'] = false;
            $options['type'] = 'text';

            $options['data-behaviour'] = 'datepicker';

            

            $options['id'] = $id = str_replace('.', '-', strtolower($name));

            if (!isset($options['class'])) {
                $options['class'] = 'input-large';
            }

            if (empty($label)) {
                $h_label = '';
            }else{
                $h_label = '<label class="control-label">' . $label . '</label>';
            }

            $input = $this->Form->input($name, $options);

            $html  = '<div class="control-group">';
            $html .= $h_label;
            $html .= "<div class='controls'>";
            $html .= $input;
            $html .= '</div>';
            $html .= '</div>';

            return  $html;
        }

        public function submit($name, $options = array()){

            if (!isset($options['class'])) {
                $options['class'] = 'btn btn-primary';
            }else{
                 $options['class'] = 'btn';
            }

            $button = $this->Form->submit($name, $options);
            $html = '<div class="form-actions">' . $button . '</div>';
            return $html;
        }
    }