<?php

namespace Sturm\App\Domain\Model;

class Person extends AbstractEntity
{

    /**
     * @xpath /person/@xml:id|/persName/@key
     * @var string $identifier
     */
    protected $identifier;

    /**
     * @xpath /person/@source
     * @var string $source
     */
    protected $source;

    /**
     * @xpath /person/persName[@type = 'pref']|/persName
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
