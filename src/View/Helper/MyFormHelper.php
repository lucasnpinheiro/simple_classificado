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

use Bootstrap3\View\Helper\BootstrapFormHelper;

class MyFormHelper extends BootstrapFormHelper {

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
        return parent::input($fieldName, $options);
    }

}
