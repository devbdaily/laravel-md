<?php

namespace Tests\DevBDaily\LaravelMD\Feature;

use Illuminate\Support\Facades\Route;

class MarkdownViewsTest extends LaravelMDTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testMarkdownDirectiveWorks()
    {
        $this->withoutExceptionHandling();
        $markdown = "test";

        $this->createRoute($markdown);

        $response = $this->get('/');

        $response->assertOk();
    }

    protected function createRoute($markdown)
    {
        Route::get('/', function () use ($markdown) {
            return view('test::test', [
                'markdown' => $markdown,
            ]);
        });
    }
}