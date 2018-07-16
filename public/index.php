<?php

use \Sturm\App\Controller\PageController;
use \Sturm\App\Controller\LetterController;
use \Sturm\App\Controller\PersonController;
use \Sturm\App\Controller\PlaceController;
use \Sturm\App\Controller\WorkController;

require '../vendor/autoload.php';

// CONFIGURATION

require '../src/Configuration/framework.php';

// INSTANTIATE

$app = new \Slim\App(['settings' => $config]);

// DEPENDENCY INJECTION CONTAINER

$container = $app->getContainer();

require '../src/Configuration/container.php';

// ACTIONS

$app->get('/', PageController::class . ':indexAction')->setName('index.html');
$app->get('/projekt.html', PageController::class . ':projectAction')->setName('projekt.html');
$app->get('/briefe.html', LetterController::class . ':listAction')->setName('briefe.html');
$app->get('/briefe/{identifier}.html', LetterController::class . ':showAction')->setName('{identifier}.html');
$app->get('/personen.html', PersonController::class . ':listAction')->setName('personen.html');
$app->get('/orte.html', PlaceController::class . ':listAction')->setName('orte.html');
$app->get('/werke.html', WorkController::class . ':listAction')->setName('werke.html');
$app->get('/impressum.html', PageController::class . ':imprintAction')->setName('impressum.html');

// RUN

$app->run();
