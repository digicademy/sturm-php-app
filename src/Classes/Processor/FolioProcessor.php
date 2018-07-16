<?php

namespace Sturm\App\Processor;

class FolioProcessor
{

    /**
     * @param array $value
     *
     * @return array
     */
    public function process($value)
    {
        $processedValue = array();
        foreach ($value as $facsimile) {
            $processedValue[(string)$facsimile['n']] = (string)$facsimile['target'];
        }

        return $processedValue;
    }
}
