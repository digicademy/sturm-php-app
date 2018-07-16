<?php

namespace Sturm\App\Domain\Model;

class Coordinates extends AbstractValueObject
{

    /**
     * @xpath /place/location/geo
     * @process GeoProcessor[type=lat]
     * @var float $latitude
     */
    protected $latitude;

    /**
     * @xpath /place/location/geo
     * @process GeoProcessor[type=long]
     * @var float $longitude
     */
    protected $longitude;

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
}
