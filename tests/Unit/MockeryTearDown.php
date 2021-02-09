<?php

namespace Tests\DevBDaily\LaravelMD\Unit;

use Mockery;

trait MockeryTearDown
{
    /**
     * Tears down the mockery container.
     *
     * @return void
     */
    protected function tearDownMockery(): void
    {
        if ($container = Mockery::getContainer()) {
            $this->addToAssertionCount($container->mockery_getExpectationCount());
        }

        Mockery::close();
    }
}