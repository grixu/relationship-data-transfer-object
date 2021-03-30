<?php

namespace Grixu\RelationshipDataTransferObject\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Spatie\LaravelRay\RayServiceProvider::class,
        ];
    }
}
