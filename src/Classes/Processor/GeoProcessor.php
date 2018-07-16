<?php

namespace Sturm\App\Processor;

class GeoProcessor
{

    /**
     * @param string $value
     * @param string $type
     *
     * @return string
     */
    public function process($value, $type)
    {
        $coordinates = explode(' ', (string)$value[0]);

        if ($type == 'lat') {
            $processedValue = $coordinates[0];
        } else {
            $processedValue = $coordinates[1];
        }

        return trim($processedValue);
    }
}
