<?php

namespace Sturm\App\Domain\Repository;

use Sturm\App\Service\XmlService;

class LetterRepository extends AbstractRepository
{

    /**
     * @return \array
     * @throws
     */
    public function findLetterIndex()
    {
        $data = $this->apiService->getAll('letters');

        $xml = XmlService::load($data);
        $xpathQueryResult = $xml->xpath('//tei:item/tei:list/tei:item');

        $result = array();
        foreach ($xpathQueryResult as $item) {
            $result[] = (string)$item->ref['target'];
        }

        return $result;
    }

}
