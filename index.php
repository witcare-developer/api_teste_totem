<?php
require_once('vendor/autoload.php');

// namespace
use Rain\Tpl;

$app = new \Slim\Slim();

// config
$config = array(
    "tpl_dir"       => "tpl/",
    "cache_dir"     => "cache/"
    //"debug"         => true, // set to false to improve the speed
);

Tpl::configure( $config );

$app->get('/', function(){
// create the Tpl object
$tpl = new Tpl;
// assign a variable
$tpl->assign( "name", "Renato Oliveira!!" );
$tpl->assign( "version", PHP_VERSION );
// assign an array
//$tpl->assign( "week", array( "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ) );

// draw the template
$tpl->draw( "index" );

});

$app->get('/teste', function(){
    // create the Tpl object
$tpl = new Tpl;
// assign a variable
$tpl->assign( "name", "Katia Cilene." );
// draw the template
$tpl->draw( "teste" );
});

$app->run();