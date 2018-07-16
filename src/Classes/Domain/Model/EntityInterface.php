<?php

namespace Sturm\App\Domain\Model;

interface EntityInterface
{

    public function getIdentifier();

    public function setIdentifier($identifier);

}
