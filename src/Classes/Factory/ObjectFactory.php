<?php

namespace Sturm\App\Factory;

use Psr\Container\ContainerInterface;

class ObjectFactory
{

    protected $container;

    /**
     * ObjectFactory constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $className
     * @param mixed  $data
     *
     * @return mixed
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function get($className, $data)
    {
        $dataMapper = $this->container->get('XmlDataMapper');

        return $dataMapper->map($className, $data);
    }
}
