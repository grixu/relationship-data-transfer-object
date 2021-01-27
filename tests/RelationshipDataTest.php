<?php

namespace Grixu\RelationshipDataTransferObject\Tests;

use Grixu\RelationshipDataTransferObject\RelationshipData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use PHPUnit\Framework\TestCase;

class RelationshipDataTest extends TestCase
{
    protected RelationshipData $obj;

    /** @test */
    public function it_creates_itself_with_belongs_to(): void
    {
        $this->createBelongsToRelationshipData();

        $this->assertEquals(RelationshipData::class, get_class($this->obj));
        $this->assertEquals(BelongsTo::class, $this->obj->type);
        $this->assertEquals(Model::class, $this->obj->localClass);
        $this->assertEquals(Model::class, $this->obj->foreignClass);
        $this->assertEquals(1, $this->obj->localKey);
        $this->assertEquals(10, $this->obj->foreignKey);
    }

    protected function createBelongsToRelationshipData(): void
    {
        $this->obj = new RelationshipData(
            [
                'type' => BelongsTo::class,
                'localClass' => Model::class,
                'foreignClass' => Model::class,
                'localRelationshipName' => 'relationship',
                'foreignRelatedFieldName' => 'id',
                'localKey' => 1,
                'foreignKey' => 10
            ]
        );
    }
    /** @test */
    public function it_creates_itself_with_m2m(): void
    {
        $this->createManyToManyRelationshipData();

        $this->assertEquals(RelationshipData::class, get_class($this->obj));
        $this->assertEquals(BelongsToMany::class, $this->obj->type);
        $this->assertEquals(Model::class, $this->obj->localClass);
        $this->assertEquals(Model::class, $this->obj->foreignClass);
        $this->assertEquals(1, $this->obj->localKey);
        $this->assertIsArray($this->obj->foreignKeys);
        $this->assertCount(4, $this->obj->foreignKeys);
    }

    protected function createManyToManyRelationshipData(): void
    {
        $this->obj = new RelationshipData(
            [
                'type' => BelongsToMany::class,
                'localClass' => Model::class,
                'foreignClass' => Model::class,
                'localRelationshipName' => 'manyToMany',
                'foreignRelatedFieldName' => 'id',
                'localKey' => 1,
                'foreignKeys' => [2, 3, 4, 5]
            ]
        );
    }
    /** @test */
    public function it_dumps_an_array(): void
    {
        $this->createBelongsToRelationshipData();

        $returnedData = $this->obj->toArray();

        $this->assertIsArray($returnedData);
        $this->assertCount(7, $returnedData);
    }
}
