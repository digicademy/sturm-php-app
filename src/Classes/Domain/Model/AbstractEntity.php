<?php

namespace Sturm\App\Domain\Model;

abstract class AbstractEntity implements EntityInterface
{
    /**
     * @var mixed
     */
    protected $identifier;

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param mixed $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }
}
