<?php

namespace Grixu\RelationshipDataTransferObject;

use Spatie\DataTransferObject\Caster;

class RelationshipDataCollectionCaster implements Caster
{
    public function cast(mixed $value): RelationshipDataCollection
    {
        return new RelationshipDataCollection(
            array_map(
                fn(array $data) => new RelationshipData(...$data),
                $value
            )
        );
    }
}
