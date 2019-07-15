<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app = new \Slim\App;

$app->get('/v1/contacts',function (Request $request,Response $response,array $args)
{
    $bdd = DB::connect();

    $cont = new Contact($bdd);

    echo $cont->getContacts();
});

$app->post('/v1/contacts/add',function(Request $request,Response $response,array $args)
{
    $bdd = DB::connect();
    
    $cont = new Contact($bdd);

    $cont->setNom($request->getParam('nom'));
    $cont->setPrenom($request->getParam('prenom'));
    $cont->setdatenais($request->getParam('date'));
    $cont->setEmail($request->getParam('mail'));
    $cont->setPhone($request->getParam('phone'));
    $cont->setAdress($request->getParam('adress'));

    echo $cont->Save();
});

$app->delete('/v1/contacts/delete/{id}',function(Request $request,Response $response,array $args)
{
    $bdd = DB::connect();
    
    $cont = new Contact($bdd);

    $cont->setId($request->getAttribute('id'));
    echo $cont->getId();
    $cont->Delete();
});

$app->put('/v1/contacts/edit/{id}',function(Request $request,Response $response,array $args)
{
    $bdd = DB::connect();
    
    $cont = new Contact($bdd);

    $cont->setId($request->getAttribute('id'));

    $cont->setNom($request->getParam('nom'));
    $cont->setPrenom($request->getParam('prenom'));
    $cont->setdatenais($request->getParam('date'));
    $cont->setEmail($request->getParam('mail'));
    $cont->setPhone($request->getParam('phone'));
    $cont->setAdress($request->getParam('adress'));

    echo $cont->Update();
});