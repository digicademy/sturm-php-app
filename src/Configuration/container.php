<?php

// MODEL

$container['Page'] = function($c) {
    $page = new \Sturm\App\Domain\Model\Page;
    return $page;
};

$container['HomePage'] = function($c) {
    $homePage = new \Sturm\App\Domain\Model\HomePage;
    return $homePage;
};

$container['Letter'] = function($c) {
    $letter = new \Sturm\App\Domain\Model\Letter;
    return $letter;
};

$container['Person'] = function($c) {
    $person = new \Sturm\App\Domain\Model\Person;
    return $person;
};

$container['Place'] = function($c) {
    $place = new \Sturm\App\Domain\Model\Place;
    return $place;
};

$container['Work'] = function($c) {
    $work = new \Sturm\App\Domain\Model\Work;
    return $work;
};

// REPOSITORY

$container['PageRepository'] = function($c) {
    $pageRepository = new \Sturm\App\Domain\Repository\PageRepository($c);
    return $pageRepository;
};

$container['LetterRepository'] = function($c) {
    $letterRepository = new \Sturm\App\Domain\Repository\LetterRepository($c);
    return $letterRepository;
};

$container['PersonRepository'] = function($c) {
    $personRepository = new \Sturm\App\Domain\Repository\PersonRepository($c);
    return $personRepository;
};

$container['PlaceRepository'] = function($c) {
    $placeRepository = new \Sturm\App\Domain\Repository\PlaceRepository($c);
    return $placeRepository;
};

$container['WorkRepository'] = function($c) {
    $workRepository = new \Sturm\App\Domain\Repository\WorkRepository($c);
    return $workRepository;
};

// FACTORY

$container['ObjectFactory'] = function($c) {
    $objectFactory = new \Sturm\App\Factory\ObjectFactory($c);
    return $objectFactory;
};

$container['ObjectStorageFactory'] = function($c) {
    $objectStorageFactory = new \Sturm\App\Factory\ObjectStorageFactory($c);
    return $objectStorageFactory;
};

// MAPPER

$container['XmlDataMapper'] = function($c) {
    $xmlDataMapper = new \Sturm\App\Persistence\XmlDataMapper($c);
    return $xmlDataMapper;
};

// SERVICE

$container['ApiService'] = function($c) {
    $apiService = new \Sturm\App\Service\ApiService($c);
    return $apiService;
};

// PROCESSOR

$container['LetterIdentifierProcessor'] = function($c) {
    $letterIdentifierProcessor = new \Sturm\App\Processor\LetterIdentifierProcessor;
    return $letterIdentifierProcessor;
};

$container['NormdataIdentifierProcessor'] = function($c) {
    $normdataIdentifierProcessor = new \Sturm\App\Processor\NormdataIdentifierProcessor;
    return $normdataIdentifierProcessor;
};

$container['FacsimileProcessor'] = function($c) {
    $facsimileProcessor = new \Sturm\App\Processor\FacsimileProcessor;
    return $facsimileProcessor;
};

$container['FolioProcessor'] = function($c) {
    $folioProcessor = new \Sturm\App\Processor\FolioProcessor;
    return $folioProcessor;
};

$container['GeoProcessor'] = function($c) {
    $geoProcessor = new \Sturm\App\Processor\GeoProcessor;
    return $geoProcessor;
};

// STORAGE

$container['ObjectStorage'] = function($c) {
    $objectStorage = new \SplObjectStorage;
    return $objectStorage;
};

// VIEW

$container['view'] = function ($container) {

    // instantiate twig view
    $view = new \Slim\Views\Twig('../templates', ['cache' => false, 'debug' => true]);

    // enable Twig debugging
    $view->addExtension(new Twig_Extension_Debug());

    // add Slim router to Twig
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};
