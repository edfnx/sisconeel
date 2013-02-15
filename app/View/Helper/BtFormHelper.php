<?php
    /*-----------------------------------------*/
    /*  Bootstrap BtForm Module Css  v 1.0.1  */
    /*-----------------------------------------*/
    
    App::uses('AppHelper', 'View/Helper');

    class BtFormHelper extends AppHelper {
        public $helpers = array('Html', 'Form');

        public function create($options = array()) {
            
            $options['class'] = 'form-horizontal';
            return $this->Form->create($options);
        }

        public function input($name, $label = null, $options = array()) {
            
            // Use the HTML helper to output
            $h_label = '';
            
            // default options:
            $options['label'] = false;
        	$options['div'] = false;
            
            $options['required'] = 'required';

            if (!isset($options['class'])) {
                $options['class'] = 'input-xlarge';
            }


            if (empty($label)) {
            	$h_label = '';
            }else{
            	$h_label = '<label class="control-label">'.$label.'</label>';
            }

            $input = $this->Form->input($name, $options);

            $html  = '<div class="control-group">';
       		$html .= $h_label;
            $html .= '<div class="controls">'. $input .'</div></div>';

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

            $html  = '<div class="control-group">'. $h_label."<div class='controls'>".$input.'</div></div>';

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