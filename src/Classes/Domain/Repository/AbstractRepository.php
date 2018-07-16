<?php

namespace Sturm\App\Domain\Repository;

use Psr\Container\ContainerInterface;
use Sturm\App\Service\XmlService;

abstract class AbstractRepository
{

    protected $container;

    protected $apiService;

    protected $objectFactory;

    protected $objectStorageFactory;

    /**
     * LetterRepository constructor.
     *
     * @param ContainerInterface $container
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->apiService = $this->container->get('ApiService');
        $this->objectFactory = $this->container->get('ObjectFactory');
        $this->objectStorageFactory = $this->container->get('ObjectStorageFactory');
    }

    /**
     * @param $objectType
     * @param $apiEndpoint
     * @param $identifier
     *
     * @return mixed
     */
    public function findByIdentifier($objectType, $apiEndpoint, $identifier)
    {
        $data = $this->apiService->getByIdentifier($identifier, $apiEndpoint);
        $result = $this->objectFactory->get($objectType, $data);

        return $result;
    }

    /**
     * @param $objectType
     * @param $identifier
     *
     * @return mixed
     */
    public function findByFileIdentifier($objectType, $identifier)
    {
        $data = $this->apiService->getByIdentifier($identifier, 'files');
        $result = $this->objectFactory->get($objectType, $data);

        return $result;
    }

    /**
     * @param string $objectType
     * @param string $apiEndpoint
     * @param string $query
     *
     * @return mixed
     * @throws \Exception
     */
    public function findAll($objectType, $apiEndpoint, $query)
    {
        $data = $this->apiService->getAll($apiEndpoint);

        $xml = XmlService::load($data);
        $xpathQueryResult = $xml->xpath($query);

        $data = '';
        foreach ($xpathQueryResult as $item) {
            $data[] = $item->asXML();
        }

        $result = $this->objectStorageFactory->getAll($objectType, $data);

        return $result;
    }

    /**
     * @param string $objectType
     * @param string $apiEndpoint
     * @param string $query
     *
     * @return integer
     * @throws \Exception
     */
    public function countAll($objectType, $apiEndpoint, $query)
    {
        $data = $this->apiService->getAll($apiEndpoint);

        $xml = XmlService::load($data);
        $xpathQueryResult = $xml->xpath($query);

        $result = count($xpathQueryResult);

        return $result;
    }

}
