<?php

namespace Elattar\LaravelMysqlSpatial\Eloquent;

use Illuminate\Database\Query\Expression;

class SpatialExpression extends Expression
{
    #[\ReturnTypeWillChange]
    public function getValue($grammar)
    {
        return "ST_GeomFromText(?, ?)";
    }

    public function getSpatialValue()
    {
        return $this->value->toWkt();
    }

    public function getSrid()
    {
        return $this->value->getSrid();
    }
}
