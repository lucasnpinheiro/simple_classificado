<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP MyHtmlHelper
 * @author lucas
 */

namespace App\View\Helper;

use Bootstrap\View\Helper\BootstrapFormHelper;

class MyFormHelper extends BootstrapFormHelper {

    public function __construct(\Cake\View\View $view, array $config = []) {
        $config['useCustomFileInput'] = true;
        parent::__construct($view, $config);
    }

    public function editor($fieldName, array $options = array()) {
        $this->Html->css('/css/redactor.css', ['block' => 'css']);
        $this->Html->script('/js/redactor.js', ['block' => 'script']);
        $this->Html->scriptBlock("
            jQuery('document').ready(function(){
                jQuery('textarea.editor_redactor').redactor({
                    buttonSource: true,
                    lang: 'pt_br',
                    imageUpload: '" . \Cake\Routing\Router::url('/midias/upload', true) . "',
                    fileUpload: '" . \Cake\Routing\Router::url('/midias/upload', true) . "',
                    imageManagerJson: '" . \Cake\Routing\Router::url('/midias/lista', true) . "',
                    plugins: ['table', 'video', 'imagemanager', 'filemanager', 'fontsize', 'fontfamily', 'fontcolor']
                });  
            });
        ", ['block' => 'script']);


        if (!isset($options['class'])) {
            $options['class'] = '';
        }
        $options['class'] .= ' editor_redactor';
        $options['type'] = 'textarea';
        return $this->input($fieldName, $options);
    }

    public function color($fieldName, array $options = array()) {
        $this->Html->css('/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css', ['block' => 'css']);
        $this->Html->script('/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js', ['block' => 'script']);
        $this->Html->scriptBlock("
            jQuery('document').ready(function(){
                $('input.color').colorpicker();  
            });
        ", ['block' => 'script']);


        if (!isset($options['class'])) {
            $options['class'] = '';
        }
        $options['class'] .= ' color';
        $options['type'] = 'text';
        return $this->input($fieldName, $options);
    }

    public function codemirror($fieldName, array $options = array()) {
        $this->Html->css('/codemirror-5.3/lib/codemirror.css', ['block' => 'css']);
        $this->Html->css('/codemirror-5.3/lib/custom.css', ['block' => 'css']);
        $this->Html->script('/codemirror-5.3/lib/codemirror.js', ['block' => 'script']);
        $this->Html->scriptBlock("
            var editor = CodeMirror.fromTextArea(document.getElementById('" . $this->_domId($fieldName) . "'), {
                            lineNumbers: true
                         });
        ", ['block' => 'script']);


        if (!isset($options['class'])) {
            $options['class'] = '';
        }
        $options['class'] .= ' codemirror';
        $options['type'] = 'textarea';
        return $this->input($fieldName, $options);
    }

    /**
     * 
     * Create & return an input block (Twitter Boostrap Like).
     * 
     * New options:
     * 	- prepend: 
     * 		-> string: Add <span class="add-on"> before the input
     * 		-> array: Add elements in array before inputs
     * 	- append: Same as prepend except it add elements after input
     *        
     * */
    public function input($fieldName, array $options = array()) {
        $options = $this->_parseOptions($fieldName, $options);
        $div = $this->_extractOption('div', $options, false);
        if (!empty($options['div'])) {
            unset($options['div']);
            $add = [];
            foreach ($div as $key => $value) {
                $add[] = $key . '="' . $value . '"';
            }
            return '<div ' . implode(' ', $add) . ' >' . parent::input($fieldName, $options) . '</div>';
        } else {
            return parent::input($fieldName, $options);
        }
    }

}
