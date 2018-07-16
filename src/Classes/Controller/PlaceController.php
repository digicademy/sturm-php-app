<?php

namespace Sturm\App\Controller;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PlaceController
{

    protected $container;

    protected $placeRepository;

    protected $view;

    /**
     * PlaceController constructor.
     *
     * @param ContainerInterface $container
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->placeRepository = $this->container->get('PlaceRepository');
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
    public function listAction(Request $request, Response $response, $args)
    {
        $places = $this->placeRepository->findAll('Place', 'places', '//tei:place');

        $placeAlphabet = array();
        foreach ($places as $place) {
            $firstLetter = substr(ucfirst($place->getName()), 0, 1);
            $placeAlphabet[$firstLetter][] = $place;
        }

        $settings = [
            'basePath' => $request->getUri()->getBasePath(),
            'path' => $request->getUri()->getPath(),
            'alphabet' => array_keys($placeAlphabet)
        ];

        return $this->view->render($response, 'orte.html',
            ['placeAlphabet' => $placeAlphabet, 'settings' => $settings]);
    }
}
