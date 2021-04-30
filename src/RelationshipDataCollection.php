<?php

namespace Grixu\RelationshipDataTransferObject;

use Illuminate\Support\Collection;

class RelationshipDataCollection extends Collection
{
    public static function create(array $data): RelationshipDataCollection
    {
        return new static(RelationshipData::arrayOf($data));
    }

    public function offsetGet($key): RelationshipData
    {
        return parent::offsetGet($key);
    }
}
