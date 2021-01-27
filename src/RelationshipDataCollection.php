<?php

namespace Grixu\RelationshipDataTransferObject;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * @method RelationshipData current
 */
class RelationshipDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): RelationshipDataCollection
    {
        return new static(RelationshipData::arrayOf($data));
    }
}
