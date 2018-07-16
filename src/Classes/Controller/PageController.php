<?php

namespace Sturm\App\Controller;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PageController
{

    protected $container;

    protected $pageRepository;

    protected $letterRepository;

    protected $personRepository;

    protected $placeRepository;

    protected $workRepository;

    protected $view;

    /**
     * PageController constructor.
     *
     * @param ContainerInterface $container
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->pageRepository = $this->container->get('PageRepository');
        $this->letterRepository = $this->container->get('LetterRepository');
        $this->personRepository = $this->container->get('PersonRepository');
        $this->placeRepository = $this->container->get('PlaceRepository');
        $this->workRepository = $this->container->get('WorkRepository');
        $this->view = $this->container->get('view');
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @param          $args
     *
     * @return mixed
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function indexAction(Request $request, Response $response, $args)
    {
        $homePage = $this->pageRepository->findByFileIdentifier('HomePage', 'index.xml');
        $lettersCount = $this->letterRepository->countAll('Letter', 'letters', '//tei:item/tei:list/tei:item');
        $personsCount = $this->personRepository->countAll('Person', 'persons', '//tei:person');
        $placesCount = $this->placeRepository->countAll('Place', 'places', '//tei:place');
        $worksCount = $this->workRepository->countAll('Work', 'works', '//tei:item');

        $settings = [
            'basePath' => $request->getUri()->getBasePath(),
            'path' => $request->getUri()->getPath()
        ];

        $templateVariables = [
            'homePage' => $homePage,
            'settings' => $settings,
            'lettersCount' => $lettersCount,
            'personsCount' => $personsCount,
            'placesCount' => $placesCount,
            'worksCount' => $worksCount,
        ];

        return $this->view->render($response, 'index.html', $templateVariables);
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @param          $args
     *
     * @return mixed
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function projectAction(Request $request, Response $response, $args)
    {
        $page = $this->pageRepository->findByFileIdentifier('Page', 'projekt.xml');

        $settings = [
            'basePath' => $request->getUri()->getBasePath(),
            'path' => $request->getUri()->getPath()
        ];

        return $this->view->render($response, 'projekt.html', ['page' => $page, 'settings' => $settings]);
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @param          $args
     *
     * @return mixed
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function imprintAction(Request $request, Response $response, $args)
    {
        $page = $this->pageRepository->findByFileIdentifier('Page', 'impressum.xml');

        $settings = [
            'basePath' => $request->getUri()->getBasePath(),
            'path' => $request->getUri()->getPath()
        ];

        return $this->view->render($response, 'impressum.html', ['page' => $page, 'settings' => $settings]);
    }

}
