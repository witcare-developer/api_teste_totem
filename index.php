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

$app->get('/', function() {

$tpl = new Tpl;
$tpl->assign( "name", "Renato Oliveira!!" );
$tpl->assign( "version", PHP_VERSION );
// draw the template
$tpl->draw( "index" );

});
// 42322721
$app->post('/salvar', function() {
    $uploaddir = 'image/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);  

    echo '<pre>';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "Arquivo válido e enviado com sucesso.\n";
    } else {
        echo "Possível ataque de upload de arquivo!\n";
    }

    echo 'Aqui está mais informações de debug:';
    print_r($_FILES);
    print_r($_POST);

    //-----

    $contents = file_get_contents('db.json');
    $json = json_decode($contents, TRUE);
    header('Content-type: application/json');
    $body = file_get_contents('php://input');

    $jsonBody = json_decode($body, true);
    $jsonBody['id'] = time();

    $jsonBody['nome_produto'] = $_POST['nome_produto'];
    $jsonBody['valor_produto'] = $_POST['valor_produto'];
    $jsonBody['link_imagem'] = 'image/' . $_FILES['userfile']['name'];
    if( !$json['produtos'] ){
        $json['produtos'] = [];
    }    
    $json['produtos'][] = $jsonBody;
    echo( json_encode($jsonBody) );
    file_put_contents('db.json', json_encode($json));

    //-------
    

    print "</pre>";

    echo "<a href='/api_teste_totem/'>Voltar</a>";

});

$app->get('/teste', function(){
$tpl = new Tpl;
// assign a variable
$tpl->assign( "name", "Katia Cilene." );
// draw the template
$tpl->draw( "teste" );
});

$app->run();