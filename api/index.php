<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/config/db.php';

//Contacts
require '../src/models/contact.php';
require '../src/routes/contact.php';

$app->run();