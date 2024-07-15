<?php

use Elattar\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GeometryModel.
 *
 * @property int                                          id
 * @property \Elattar\LaravelMysqlSpatial\Types\Point      location
 * @property \Elattar\LaravelMysqlSpatial\Types\LineString line
 * @property \Elattar\LaravelMysqlSpatial\Types\LineString shape
 */
class GeometryModel extends Model
{
    use SpatialTrait;

    protected $table = 'geometry';

    protected $spatialFields = ['location', 'line', 'multi_geometries'];
}
