<?php

namespace Sturm\App\Service;

use DOMDocument;
use XSLTProcessor;

class XmlService
{

    /**
     * @param $xml
     * @param $styleSheets
     *
     * @return string
     * @throws \Exception
     */
    public static function transform($xml, $styleSheets)
    {
        $result = '';

        // Check if necessary PHP XML extensions are loaded
        if (extension_loaded('SimpleXML')
            && extension_loaded('libxml')
            && extension_loaded('dom')
            && extension_loaded('xsl')) {

            $xmlToTransform = simplexml_load_string($xml);

            if ($xmlToTransform instanceof \SimpleXMLElement) {

                $domXML = dom_import_simplexml($xmlToTransform);

                if ($domXML instanceof \DOMElement && count($styleSheets) > 0) {

                    foreach ($styleSheets as $styleSheet) {

                        if (file_exists($styleSheet)) {

                            $styleSheetContent = file_get_contents($styleSheet);

                            $xsl = new DOMDocument;
                            $xsl->loadXML($styleSheetContent);

                            $xslt = new XSLTProcessor;
                            $xslt->importStylesheet($xsl);
                            $xslt->registerPHPFunctions();

                            if ($result !== '') {

                                // load transformed XML from last run into new DOM object
                                $formerResult = new DOMDocument;

                                // if XML is valid, apply current XSL
                                if ($formerResult->loadXML($result) !== false) {
                                    $result = $xslt->transformToXML($formerResult);
                                }

                                // First run, process the loaded source
                            } else {
                                $result = $xslt->transformToXML($domXML);
                            }

                        } else {
                            throw new \Exception('Wrong path to XSLT stylesheet: ' . $styleSheet, '1516859790');
                        }
                    }
                } else {
                    throw new \Exception('DOM could not be initialized', '1516859106');
                }
            } else {
                throw new \Exception('SimpleXML could not be initialized', '1516858900');
            }
        } else {
            throw new \Exception('SimpleXML, dom, xsl and libxml must be loaded', '1516858156');
        }

        return $result;

    }

    /**
     * @param $xml
     *
     * @return \SimpleXMLElement
     * @throws \Exception
     */
    public static function load($xml)
    {

        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($xml);
        if (false === $xml) {
            throw new \Exception('XML could not be loaded', '1516826980');
        }
        $xml->registerXPathNamespace('tei', 'http://www.tei-c.org/ns/1.0');

        return $xml;
    }

}
