<?php

namespace Sturm\App\Controller;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LetterController
{

    protected $container;

    protected $letterRepository;

    protected $view;

    /**
     * LetterController constructor.
     *
     * @param ContainerInterface $container
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->letterRepository = $this->container->get('LetterRepository');
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
        $letters = $this->letterRepository->findAll('Letter', 'letters', '//tei:item/tei:list/tei:item');

        $settings = [
            'basePath' => $request->getUri()->getBasePath(),
            'path' => $request->getUri()->getPath()
        ];

        return $this->view->render($response, 'briefe.html', ['letters' => $letters, 'settings' => $settings]);
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
    public function showAction(Request $request, Response $response, $args)
    {
        $identifier = $args['identifier'] . '.xml';

        $letter = $this->letterRepository->findByFileIdentifier('Letter', $identifier);
        $letterIndex = $this->letterRepository->findLetterIndex();
        $letterPosition = array_search($identifier, $letterIndex);

        $pagination = [
            'first' => $letterIndex[0],
            'previous' => $letterIndex[$letterPosition - 1],
            'next' => $letterIndex[$letterPosition + 1],
            'last' => end($letterIndex)
        ];

        $settings = [
            'basePath' => $request->getUri()->getBasePath(),
            'path' => $request->getUri()->getPath(),
            'pagination' => $pagination
        ];

        return $this->view->render($response, 'brief.html', ['letter' => $letter, 'settings' => $settings]);
    }

}
