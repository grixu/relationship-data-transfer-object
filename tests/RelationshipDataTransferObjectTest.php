<?php

namespace Grixu\RelationshipDataTransferObject\Tests;

use Grixu\RelationshipDataTransferObject\RelationshipDataCollection;
use Grixu\RelationshipDataTransferObject\RelationshipDataTransferObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use PHPUnit\Framework\TestCase;

class RelationshipDataTransferObjectTest extends TestCase
{
    protected $obj;

    protected function setUp(): void
    {
        parent::setUp();

        $data = [
            'test' => 'Test',
            'relationships' => [
                [
                    'localModel' => Model::class,
                    'foreignModel' => Model::class,
                    'type' => BelongsTo::class,
                    'localRelationshipName' => 'relationship',
                    'foreignRelatedFieldName' => 'id',
                    'localKey' => 1,
                    'foreignKey' => 10,
                ],
                [
                    'localModel' => Model::class,
                    'foreignModel' => Model::class,
                    'type' => BelongsToMany::class,
                    'localRelationshipName' => 'manyToMany',
                    'foreignRelatedFieldName' => 'id',
                    'localKey' => 2,
                    'foreignKey' => 4
                ]
            ]
        ];

        $this->obj = new class($data) extends RelationshipDataTransferObject
        {
            public string $test;
        };
    }

    /** @test */
    public function it_creates()
    {
        $this->assertTrue(is_subclass_of($this->obj, RelationshipDataTransferObject::class));
    }

    /** @test */
    public function it_dumps_array_without_relationship()
    {
        $returnedData = $this->obj->toArray();
        $this->assertCount(1, $returnedData);
    }

    /** @test */
    public function it_have_access_to_relationships()
    {
        $this->assertEquals(RelationshipDataCollection::class, get_class($this->obj->relationships));
        $this->assertNotEmpty($this->obj->relationships);
        $this->assertCount(2, $this->obj->relationships);
    }
}
