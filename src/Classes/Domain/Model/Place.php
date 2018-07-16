<?php

namespace Sturm\App\Domain\Model;

class Place extends AbstractEntity
{

    /**
     * @xpath /place/@xml:id
     * @var string $identifier
     */
    protected $identifier;

    /**
     * @xpath /place/@source
     * @var string $source
     */
    protected $source;

    /**
     * @xpath /place/placeName[@type = 'pref']
     * @var string $name
     */
    protected $name;

    /**
     * @var \Sturm\App\Domain\Model\Coordinates $coordinates
     */
    protected $coordinates;

    /**
     * @xpath //ptr
     * @process FolioProcessor
     * @var array $folios
     */
    protected $folios;

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return \Sturm\App\Domain\Model\Coordinates
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param \Sturm\App\Domain\Model\Coordinates $coordinates
     */
    public function setCoordinates(Coordinates $coordinates)
    {
        $this->coordinates = $coordinates;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getFolios()
    {
        return $this->folios;
    }

    /**
     * @param array $folios
     */
    public function setFolios($folios)
    {
        $this->folios = $folios;
    }

}
