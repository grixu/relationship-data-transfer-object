<?php

namespace Grixu\RelationshipDataTransferObject;

use Spatie\DataTransferObject\DataTransferObject;

class RelationshipData extends DataTransferObject
{
    public string $localClass;
    public string $foreignClass;
    public string $type;
    public string $localRelationshipName;
    public string $foreignRelatedFieldName;
    public string|int|null $localKey;
    public string|int|null $foreignKey;
    public array|null $foreignKeys;
    public array|null $pivot;
}
