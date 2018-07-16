<?php

namespace Sturm\App\Domain\Model;

class Letter extends AbstractEntity
{

    /**
     * @xpath /item/@xml:id|//tei:TEI/@xml:id
     * @var string $identifier
     */
    protected $identifier;

    /**
     * @xpath //item/ref[2]/@target|//tei:msIdentifier/tei:idno[@type='uri']
     * @var string $source
     */
    protected $source;

    /**
     * @xpath /item/ref[1]/@target|//tei:publicationStmt/tei:idno[@type='file']
     * @var string $file
     */
    protected $file;

    /**
     * @xpath //tei:xenoData
     * @var string $metaData
     */
    protected $metaData;

    /**
     * @xpath //tei:titleStmt/tei:editor
     * @transform html.xsl
     * @var mixed $editor
     */
    protected $editor;

    /**
     * @xpath //tei:revisionDesc/tei:listChange/tei:change[1]/tei:date/@when
     * @var string $editDate
     */
    protected $editDate;

    /**
     * @xpath //item/ref[2]|//tei:correspDesc/@key
     * @var string $signature
     */
    protected $signature;

    /**
     * @xpath //item/@n|//tei:text/@type
     * @var string $type
     */
    protected $type;

    /**
     * @xpath //item/ref[1]/time/@when|//tei:correspAction[@type = 'sent']//tei:date/@when||//tei:correspAction[@type = 'sent']//tei:date/@notBefore
     * @var string $date
     */
    protected $date;

    /**
     * @xpath //tei:dateline/tei:date
     * @var string $dateLine
     */
    protected $dateLine;

    /**
     * @xpath //tei:correspAction[@type = 'sent']/tei:persName
     * @var string $sender
     */
    protected $sender;

    /**
     * @xpath //tei:correspAction[@type = 'sent']/tei:persName/@ref
     * @var string $senderUri
     */
    protected $senderUri;

    /**
     * @xpath //tei:correspAction[@type = 'received']/tei:persName
     * @var string $recipient
     */
    protected $recipient;

    /**
     * @xpath //tei:correspAction[@type = 'received']/tei:persName/@ref
     * @var string $recipientUri
     */
    protected $recipientUri;

    /**
     * @xpath //item/ref[1]/placeName|//tei:correspAction[@type = 'sent']/tei:placeName
     * @var string $placeSent
     */
    protected $placeSent;

    /**
     * @xpath //tei:correspAction[@type = 'sent']/tei:placeName/@key
     * @var string $placeSentIdentifier
     */
    protected $placeSentIdentifier;

    /**
     * @xpath //tei:correspAction[@type = 'sent']/tei:placeName/@ref
     * @var string $placeSentUri
     */
    protected $placeSentUri;

    /**
     * @xpath //tei:correspAction[@type = 'received']/tei:placeName
     * @var string $placeReceived
     */
    protected $placeReceived;

    /**
     * @xpath //tei:correspAction[@type = 'received']/tei:placeName/@key
     * @var string $placeReceivedIdentifier
     */
    protected $placeReceivedIdentifier;

    /**
     * @xpath //tei:correspAction[@type = 'received']/tei:placeName/@ref
     * @var string $placeReceivedUri
     */
    protected $placeReceivedUri;

    /**
     * @xpath //tei:facsimile
     * @process FacsimileProcessor
     * @var array $facsimiles
     */
    protected $facsimiles;

    /**
     * @xpath //tei:text
     * @transform html.xsl
     * @var mixed $text
     */
    protected $text;

    /**
     * @xpath //tei:text//tei:persName
     * @var \SplObjectStorage \Sturm\App\Domain\Model\Person
     */
    protected $persons;

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getMetaData()
    {
        return $this->metaData;
    }

    /**
     * @param string $metaData
     */
    public function setMetaData($metaData)
    {
        $this->metaData = $metaData;
    }

    /**
     * @return string
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * @param string $editor
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;
    }

    /**
     * @return string
     */
    public function getEditDate()
    {
        return $this->editDate;
    }

    /**
     * @param string $editDate
     */
    public function setEditDate($editDate)
    {
        $this->editDate = $editDate;
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getDateLine()
    {
        return $this->dateLine;
    }

    /**
     * @param string $dateLine
     */
    public function setDateLine($dateLine)
    {
        $this->dateLine = $dateLine;
    }

    /**
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param string $sender
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    /**
     * @return string
     */
    public function getSenderUri()
    {
        return $this->senderUri;
    }

    /**
     * @param string $senderUri
     */
    public function setSenderUri($senderUri)
    {
        $this->senderUri = $senderUri;
    }

    /**
     * @return string
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @param string $recipient
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;
    }

    /**
     * @return string
     */
    public function getRecipientUri()
    {
        return $this->recipientUri;
    }

    /**
     * @param string $recipientUri
     */
    public function setRecipientUri($recipientUri)
    {
        $this->recipientUri = $recipientUri;
    }

    /**
     * @return string
     */
    public function getPlaceSent()
    {
        return $this->placeSent;
    }

    /**
     * @param string $placeSent
     */
    public function setPlaceSent($placeSent)
    {
        $this->placeSent = $placeSent;
    }

    /**
     * @return string
     */
    public function getPlaceSentIdentifier()
    {
        return $this->placeSentIdentifier;
    }

    /**
     * @param string $placeSentIdentifier
     */
    public function setPlaceSentIdentifier($placeSentIdentifier)
    {
        $this->placeSentIdentifier = $placeSentIdentifier;
    }

    /**
     * @return string
     */
    public function getPlaceSentUri()
    {
        return $this->placeSentUri;
    }

    /**
     * @param string $placeSentUri
     */
    public function setPlaceSentUri($placeSentUri)
    {
        $this->placeSentUri = $placeSentUri;
    }

    /**
     * @return string
     */
    public function getPlaceReceived()
    {
        return $this->placeReceived;
    }

    /**
     * @param string $placeReceived
     */
    public function setPlaceReceived($placeReceived)
    {
        $this->placeReceived = $placeReceived;
    }

    /**
     * @return string
     */
    public function getPlaceReceivedIdentifier()
    {
        return $this->placeReceivedIdentifier;
    }

    /**
     * @param string $placeReceivedIdentifier
     */
    public function setPlaceReceivedIdentifier($placeReceivedIdentifier)
    {
        $this->placeReceivedIdentifier = $placeReceivedIdentifier;
    }

    /**
     * @return string
     */
    public function getPlaceReceivedUri()
    {
        return $this->placeReceivedUri;
    }

    /**
     * @param string $placeReceivedUri
     */
    public function setPlaceReceivedUri($placeReceivedUri)
    {
        $this->placeReceivedUri = $placeReceivedUri;
    }

    /**
     * @return array
     */
    public function getFacsimiles()
    {
        return $this->facsimiles;
    }

    /**
     * @param array $facsimiles
     */
    public function setFacsimiles($facsimiles)
    {
        $this->facsimiles = $facsimiles;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return \SplObjectStorage \Sturm\App\Domain\Model\Person
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * @param \SplObjectStorage \Sturm\App\Domain\Model\Person $persons
     */
    public function setPersons(\SplObjectStorage $persons)
    {
        $this->persons = $persons;
    }

}
