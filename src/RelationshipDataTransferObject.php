<?php

namespace Grixu\RelationshipDataTransferObject;

use Illuminate\Support\Arr;
use Spatie\DataTransferObject\DataTransferObject;

abstract class RelationshipDataTransferObject extends DataTransferObject
{
    public ?RelationshipDataCollection $relationships;

    public function toArray(): array
    {
        $array = parent::toArray();

        Arr::pull($array, 'relationships');
        return $array;
    }
}
