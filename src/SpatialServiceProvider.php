<?php

namespace Elattar\LaravelMysqlSpatial;

use Doctrine\DBAL\Types\Type as DoctrineType;
use Elattar\LaravelMysqlSpatial\Connectors\ConnectionFactory;
use Elattar\LaravelMysqlSpatial\Doctrine\Geometry;
use Elattar\LaravelMysqlSpatial\Doctrine\GeometryCollection;
use Elattar\LaravelMysqlSpatial\Doctrine\LineString;
use Elattar\LaravelMysqlSpatial\Doctrine\MultiLineString;
use Elattar\LaravelMysqlSpatial\Doctrine\MultiPoint;
use Elattar\LaravelMysqlSpatial\Doctrine\MultiPolygon;
use Elattar\LaravelMysqlSpatial\Doctrine\Point;
use Elattar\LaravelMysqlSpatial\Doctrine\Polygon;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\DatabaseServiceProvider;

/**
 * Class DatabaseServiceProvider.
 */
class SpatialServiceProvider extends DatabaseServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        // No need to register the Connection Factory, cause laravel already support geometry, geography types
//        $this->app->singleton('db.factory', fn ($app) => new ConnectionFactory($app));

        // The database manager is used to resolve various connections, since multiple
        // connections might be managed. It also implements the connection resolver
        // interface which may be used by other components requiring connections.
//        $this->app->singleton('db', fn ($app) => new DatabaseManager($app, $app['db.factory']));

//        $this->app->bind('db.schema', fn ($app) => $app['db']->connection()->getSchemaBuilder());

//        if (class_exists(DoctrineType::class)) {
////             Prevent geometry type fields from throwing a 'type not found' error when changing them
//            $geometries = [
//                'geometry'           => Geometry::class,
//                'point'              => Point::class,
//                'linestring'         => LineString::class,
//                'polygon'            => Polygon::class,
//                'multipoint'         => MultiPoint::class,
//                'multilinestring'    => MultiLineString::class,
//                'multipolygon'       => MultiPolygon::class,
//                'geometrycollection' => GeometryCollection::class,
//            ];
//            $typeNames = array_keys(DoctrineType::getTypesMap());
//            foreach ($geometries as $type => $class) {
//                if (!in_array($type, $typeNames)) {
//                    DoctrineType::addType($type, $class);
//                }
//            }
//        }
    }
}
