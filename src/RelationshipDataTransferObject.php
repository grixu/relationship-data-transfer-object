<?php

namespace Grixu\RelationshipDataTransferObject;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

abstract class RelationshipDataTransferObject extends DataTransferObject
{
    #[CastWith(RelationshipDataCollectionCaster::class)]
    public RelationshipDataCollection|null $relationships;
}
