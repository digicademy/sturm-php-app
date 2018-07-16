<?php

namespace Sturm\App\Processor;

class FacsimileProcessor
{

    /**
     * @param array $value
     *
     * @return array
     */
    public function process($value)
    {
        $processedValue = array();
        foreach ($value[0] as $facsimile) {
            $processedValue[(string)$facsimile['n']] = (string)$facsimile['url'];
        }

        return $processedValue;
    }
}
