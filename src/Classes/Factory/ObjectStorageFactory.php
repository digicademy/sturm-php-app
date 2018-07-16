<?php

namespace Sturm\App\Factory;

use Psr\Container\ContainerInterface;

class ObjectStorageFactory
{

    protected $container;

    /**
     * ObjectStorageFactory constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $className
     * @param array  $data
     *
     * @return mixed
     * @throws \Exception
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function getAll($className, $data)
    {

        $dataMapper = $this->container->get('XmlDataMapper');
        $objectStorage = $this->container->get('ObjectStorage');

        foreach ($data as $key => $value) {
            $object = $dataMapper->map($className, $value);
            $objectStorage->attach($object, $object->getIdentifier());
        }

        return $objectStorage;
    }
}
