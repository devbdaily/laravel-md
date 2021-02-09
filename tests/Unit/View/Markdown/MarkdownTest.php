<?php

namespace Tests\DevBDaily\LaravelMD\Unit\View\Markdown;

use DevBDaily\LaravelMD\View\Markdown\Markdown;
use League\CommonMark\CommonMarkConverter;
use \Mockery;
use PHPUnit\Framework\TestCase;
use Tests\DevBDaily\LaravelMD\Unit\MockeryTearDown;

class MarkdownTest extends TestCase
{
    use MockeryTearDown;

    /**
     * Tear down the test services.
     *
     * @return void
     */
    public function tearDown(): void
    {
        $this->tearDownMockery();
    }

    public function testParseUsesConverter()
    {
        $string = 'string';
        $converter = Mockery::mock(CommonMarkConverter::class);

        $converter->shouldReceive('convertToHtml')
            ->with($string)
            ->once()
            ->andReturn($string);

        $markdown = new Markdown($converter);

        $this->assertEquals($string, $markdown->parse($string));
    }
}