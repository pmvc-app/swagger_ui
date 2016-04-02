<?php

$b = new PMVC\MappingBuilder();
${_INIT_CONFIG}[_CLASS] = 'SwaggerUiAction';
${_INIT_CONFIG}[_INIT_BUILDER] = $b;


$b->addAction('index', [${_INIT_CONFIG}[_CLASS],'index']);
$b->addAction('css', [${_INIT_CONFIG}[_CLASS],'asset']);
$b->addAction('lib', [${_INIT_CONFIG}[_CLASS],'asset']);
$b->addAction('swagger-ui.min.js', [${_INIT_CONFIG}[_CLASS],'asset']);
$b->addAction('fonts', [${_INIT_CONFIG}[_CLASS],'asset']);

$b->addForward('home', array(
    _PATH=>'index'
    ,_TYPE=>'view'
));

\PMVC\getC()->store([
    _TEMPLATE_DIR=> __DIR__.'/themes/',
    _VIEW_ENGINE=>"html"
]);

class SwaggerUiAction extends PMVC\Action
{
    static function index($m, $f)
    {
       $go = $m['home'];
       return $go;
    }

    static function asset($m, $f)
    {
        $url = \PMVC\plug('url');
        $c = \PMVC\getC();
        $app = $c->getApp();
        $pathInfo = $url->getPathInfo();
        $path = str_replace('/'.$app.'/', '', $pathInfo);
        $asset = __DIR__.'/'.'themes/asset/'.$path;
        $action = $c->getAppAction(); 
        switch ($action) {
            case 'css':
                header("Content-type: text/css");
                break;
            default:
                header('Content-Type: application/javascript');
                break;
                
        }
        readfile($asset);
    }
}




