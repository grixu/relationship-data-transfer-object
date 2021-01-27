<?php

namespace Grixu\RelationshipDataTransferObject;

use Spatie\DataTransferObject\DataTransferObject;

class RelationshipData extends DataTransferObject
{
    public string $localClass;
    public string $foreignClass;
    public string $type;
    public int $localKey;
    public ?int $foreignKey;
    public ?array $foreignKeys;
    public ?array $pivot;
}
