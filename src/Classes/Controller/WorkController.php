<?php

namespace Sturm\App\Controller;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class WorkController
{

    protected $container;

    protected $workRepository;

    protected $view;

    /**
     * WorkController constructor.
     *
     * @param ContainerInterface $container
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
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
    public function listAction(Request $request, Response $response, $args)
    {
        $works = $this->workRepository->findAll('Work', 'works', '//tei:item');

        $workAlphabet = array();
        foreach ($works as $work) {
            $firstLetter = substr(ucfirst($work->getName()), 0, 1);
            $workAlphabet[$firstLetter][] = $work;
        }

        $settings = [
            'basePath' => $request->getUri()->getBasePath(),
            'path' => $request->getUri()->getPath(),
            'alphabet' => array_keys($workAlphabet)
        ];

        return $this->view->render($response, 'werke.html',
            ['workAlphabet' => $workAlphabet, 'settings' => $settings]);
    }
}
