<?php
include_once('../../../../pmvc/pmvc/include.php');
\PMVC\setPlugInFolder('../../../../pmvc-plugin');
include_once('../../../../pmvc-plugin/view/src/ViewEngine.php');
include_once('../../../../pmvc-plugin/view/src/Template.php');
use \PMVC\ActionController as mvc;
$envfile = '../../.env';
if (is_file($envfile)) {
    $env = array('envfile'=>$envfile);
} else {
    $env = null;
}

$options = array(
   _PLUGIN=>array(
        'error'=>null
        ,'debug'=>null
        ,'dotenv'=>$env
        ,'view_html'=>null
    )
    ,_VIEW_ENGINE=>"html"
    ,_TEMPLATE_DIR=>"../"
    ,_ERROR_REPORTING=>E_ALL
    ,_RUN_APP=>'swagger_ui'
);
$controller = new mvc($options);
if($controller->plugApp('../../../')){
    $controller->process();
}
