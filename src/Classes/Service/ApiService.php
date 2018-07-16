<?php

namespace Sturm\App\Service;

use GuzzleHttp\Client as HttpClient;
use Psr\Container\ContainerInterface;

class ApiService
{

    protected $container;

    protected $baseUri;

    /**
     * ApiService constructor.
     *
     * @param ContainerInterface $container
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->baseUri = $this->container->get('settings')['apiUri'];
    }

    /**
     * @param string $identifier
     * @param string $collection
     *
     * @return string
     */
    public function getByIdentifier($identifier, $collection)
    {
        $httpClient = new HttpClient(['base_uri' => $this->baseUri . $collection . '/']);
        $response = (string)$httpClient->request('GET', $identifier)->getBody();

        return $response;
    }

    /**
     * @param string $collection
     *
     * @return string
     */
    public function getAll($collection)
    {
        $httpClient = new HttpClient(['base_uri' => $this->baseUri]);
        $response = (string)$httpClient->request('GET', $collection . '/')->getBody();

        return $response;
    }

}
