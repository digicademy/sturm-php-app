<?php

namespace Sturm\App\Persistence;

interface DataMapperInterface
{

    /**
     * @param string $className
     * @param mixed  $data
     */
    public function map($className, $data);
}
