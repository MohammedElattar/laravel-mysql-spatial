<?php

namespace Elattar\LaravelMysqlSpatial\Types;

use GeoJson\GeoJson;
use GeoJson\Geometry\LineString as GeoJsonLineString;
use Elattar\LaravelMysqlSpatial\Exceptions\InvalidGeoJsonException;

class LineString extends PointCollection
{
    /**
     * The minimum number of items required to create this collection.
     *
     * @var int
     */
    protected $minimumCollectionItems = 2;

    public function toWKT()
    {
        return sprintf('LINESTRING(%s)', $this->toPairList());
    }

    public static function fromWkt($wkt, $srid = 0)
    {
        $wktArgument = Geometry::getWKTArgument($wkt);

        return static::fromString($wktArgument, $srid);
    }

    public static function fromString($wktArgument, $srid = 0)
    {
        $pairs = explode(',', trim($wktArgument));
        $points = array_map(function ($pair) {
            return Point::fromPair($pair);
        }, $pairs);

        return new static($points, $srid);
    }

    public function __toString()
    {
        return $this->toPairList();
    }

    public static function fromJson($geoJson)
    {
        if (is_string($geoJson)) {
            $geoJson = GeoJson::jsonUnserialize(json_decode($geoJson));
        }

        if (!is_a($geoJson, GeoJsonLineString::class)) {
            throw new InvalidGeoJsonException('Expected '.GeoJsonLineString::class.', got '.get_class($geoJson));
        }

        $set = [];
        foreach ($geoJson->getCoordinates() as $coordinate) {
            $set[] = new Point($coordinate[1], $coordinate[0]);
        }

        return new self($set);
    }

    /**
     * Convert to GeoJson LineString that is jsonable to GeoJSON.
     *
     * @return \GeoJson\Geometry\LineString
     */
    public function jsonSerialize()
    {
        $points = [];
        foreach ($this->items as $point) {
            $points[] = $point->jsonSerialize();
        }

        return new GeoJsonLineString($points);
    }
}
