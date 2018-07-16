<?php

namespace Sturm\App\Controller;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PersonController
{

    protected $container;

    protected $personRepository;

    protected $view;

    /**
     * PersonController constructor.
     *
     * @param ContainerInterface $container
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->personRepository = $this->container->get('PersonRepository');
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
        $persons = $this->personRepository->findAll('Person', 'persons', '//tei:person');

        $personAlphabet = array();
        foreach ($persons as $person) {
            $firstLetter = substr(ucfirst($person->getName()), 0, 1);
            $personAlphabet[$firstLetter][] = $person;
        }

        $settings = [
            'basePath' => $request->getUri()->getBasePath(),
            'path' => $request->getUri()->getPath(),
            'alphabet' => array_keys($personAlphabet)
        ];

        return $this->view->render($response, 'personen.html',
            ['personAlphabet' => $personAlphabet, 'settings' => $settings]);
    }
}
