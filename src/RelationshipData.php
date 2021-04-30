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
    public ?string $localKey;
    public ?string $foreignKey;
    public ?array $foreignKeys;
    public ?array $pivot;
}
