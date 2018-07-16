<?php

namespace Sturm\App\Domain\Model;

class Page extends AbstractEntity
{

    /**
     * @xpath //tei:publicationStmt/tei:idno
     * @var string $identifier
     */
    protected $identifier;

    /**
     * @xpath //tei:titleStmt/tei:title
     * @var string $title
     */
    protected $title;

    /**
     * @xpath //tei:revisionDesc/tei:listChange/tei:change[1]/tei:date/@when
     * @var string $date
     */
    protected $date;

    /**
     * @xpath //tei:body/tei:div
     * @transform html.xsl
     * @var mixed $content
     */
    protected $content;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param $content
     *
     * @throws \Exception
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

}
