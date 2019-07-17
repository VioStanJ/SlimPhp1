<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;



require '../vendor/autoload.php';
require '../src/config/db.php';

//Contacts
require '../src/models/contact.php';
require '../src/routes/contact.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

$app->options('/(:name+)', function() use($app) {                  
    $response = $app->response();
    $app->response()->status(200);
    $response->header('Access-Control-Allow-Origin', '*'); 
    $response->header('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, X-authentication, X-client');
    $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
 });

$app->run();