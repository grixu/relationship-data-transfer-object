<?php

namespace Grixu\RelationshipDataTransferObject\Tests;

use Grixu\RelationshipDataTransferObject\RelationshipDataCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PHPUnit\Framework\TestCase;

class RelationshipDataCollectionTest extends TestCase
{
    protected RelationshipDataCollection $obj;

    protected function setUp(): void
    {
        parent::setUp();

        $this->obj = new RelationshipDataCollection(
            [
                [
                    'localModel' => Model::class,
                    'foreignModel' => Model::class,
                    'type' => BelongsTo::class,
                    'localKey' => 1,
                    'foreignKey' => 10,
                ],
                [
                    'localModel' => Model::class,
                    'foreignModel' => Model::class,
                    'type' => HasMany::class,
                    'localKey' => 2,
                    'foreignKey' => 4
                ]
            ]
        );
    }

    /** @test */
    public function it_creates()
    {
        $this->assertEquals(RelationshipDataCollection::class, get_class($this->obj));
        $this->assertCount(2, $this->obj->toArray());
    }

    /** @test */
    public function it_iterates()
    {
        foreach ($this->obj as $entry) {
            $this->assertNotEmpty($entry);
        }
    }
}
