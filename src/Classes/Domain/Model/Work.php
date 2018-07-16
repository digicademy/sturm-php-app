<?php

namespace Sturm\App\Domain\Model;

class Work extends AbstractEntity
{
    /**
     * @xpath /item/@xml:id
     * @var string $identifier
     */
    protected $identifier;

    /**
     * @xpath /item/@source
     * @var string $source
     */
    protected $source;

    /**
     * @xpath /item/@n
     * @var string $type
     */
    protected $type;

    /**
     * @xpath /item/name[@type = 'pref']
     * @var string $name
     */
    protected $name;

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
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
