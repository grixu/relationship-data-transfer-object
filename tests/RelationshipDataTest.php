<?php

namespace Grixu\RelationshipDataTransferObject\Tests;

use Grixu\RelationshipDataTransferObject\RelationshipData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPUnit\Framework\TestCase;

class RelationshipDataTest extends TestCase
{
    protected RelationshipData $obj;

    protected function setUp(): void
    {
        parent::setUp();

        $this->obj = new RelationshipData(
            [
                'type' => BelongsTo::class,
                'localClass' => Model::class,
                'foreignClass' => Model::class,
                'localKey' => 1,
                'foreignKey' => 10
            ]
        );
    }

    /** @test */
    public function it_creates_itself()
    {
        $this->assertEquals(RelationshipData::class, get_class($this->obj));
        $this->assertEquals(BelongsTo::class, $this->obj->type);
        $this->assertEquals(Model::class, $this->obj->localClass);
        $this->assertEquals(Model::class, $this->obj->foreignClass);
        $this->assertEquals(1, $this->obj->localKey);
        $this->assertEquals(10, $this->obj->foreignKey);
    }

    /** @test */
    public function it_dumps_an_array()
    {
        $returnedData = $this->obj->toArray();

        $this->assertIsArray($returnedData);
        $this->assertCount(6, $returnedData);
    }
}
