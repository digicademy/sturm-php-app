<?php

namespace Sturm\App\Domain\Model;

class HomePage extends Page
{

    /**
     * @xpath //tei:div[@n = 'letters']/tei:p
     * @var string $letterTeaserBox
     */
    protected $letterTeaserBox;

    /**
     * @xpath //tei:div[@n = 'persons']/tei:p
     * @var string $personTeaserBox
     */
    protected $personTeaserBox;

    /**
     * @xpath //tei:div[@n = 'places']/tei:p
     * @var string $placeTeaserBox
     */
    protected $placeTeaserBox;

    /**
     * @xpath //tei:div[@n = 'works']/tei:p
     * @var string $workTeaserBox
     */
    protected $workTeaserBox;

    /**
     * @return string
     */
    public function getLetterTeaserBox()
    {
        return $this->letterTeaserBox;
    }

    /**
     * @param string $letterTeaserBox
     */
    public function setLetterTeaserBox($letterTeaserBox)
    {
        $this->letterTeaserBox = $letterTeaserBox;
    }

    /**
     * @return string
     */
    public function getPersonTeaserBox()
    {
        return $this->personTeaserBox;
    }

    /**
     * @param string $personTeaserBox
     */
    public function setPersonTeaserBox($personTeaserBox)
    {
        $this->personTeaserBox = $personTeaserBox;
    }

    /**
     * @return string
     */
    public function getPlaceTeaserBox()
    {
        return $this->placeTeaserBox;
    }

    /**
     * @param string $placeTeaserBox
     */
    public function setPlaceTeaserBox($placeTeaserBox)
    {
        $this->placeTeaserBox = $placeTeaserBox;
    }

    /**
     * @return string
     */
    public function getWorkTeaserBox()
    {
        return $this->workTeaserBox;
    }

    /**
     * @param string $workTeaserBox
     */
    public function setWorkTeaserBox($workTeaserBox)
    {
        $this->workTeaserBox = $workTeaserBox;
    }

}
