<?php

namespace Tests\DevBDaily\LaravelMD\Feature;

use DevBDaily\LaravelMD\ServiceProvider;
use Orchestra\Testbench\TestCase;

class LaravelMDTestCase extends TestCase
{
    /**
     * Set up before tests.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
            TestServiceProvider::class,
        ];
    }
}