<?php

namespace Grixu\RelationshipDataTransferObject;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class RelationshipDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): RelationshipDataCollection
    {
        return new static(RelationshipData::arrayOf($data));
    }

    public function current(): RelationshipData
    {
        return parent::current();
    }
}
