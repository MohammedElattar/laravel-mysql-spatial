<?php

use Elattar\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WithSridModel.
 *
 * @property int                                          id
 * @property \Elattar\LaravelMysqlSpatial\Types\Point      location
 * @property \Elattar\LaravelMysqlSpatial\Types\LineString line
 * @property \Elattar\LaravelMysqlSpatial\Types\LineString shape
 */
class WithSridModel extends Model
{
    use SpatialTrait;

    protected $table = 'with_srid';

    protected $spatialFields = ['location', 'line'];

    public $timestamps = false;
}
