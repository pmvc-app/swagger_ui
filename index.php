<?php

$b = new PMVC\MappingBuilder();
${_INIT_CONFIG}[_CLASS] = 'SwaggerUiAction';
${_INIT_CONFIG}[_INIT_BUILDER] = $b;

$b->addAction('index', array(
    _FUNCTION=>array('SwaggerUiAction','index')
));

$b->addForward('home', array(
    _PATH=>'index'
    ,_TYPE=>'view'
));


class SwaggerUiAction extends PMVC\Action
{
    static function index($m, $f){
       $go = $m['home'];
       return $go;
    }

}




