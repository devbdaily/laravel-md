<?php

namespace Tests\DevBDaily\LaravelMD\Feature;

use Illuminate\Support\Facades\Route;

class MarkdownViewsTest extends LaravelMDTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testMarkdownDirectiveDoesNotThrowErrors()
    {
        $markdown = "test";

        $this->createRoute($markdown);

        $response = $this->get('/');

        $response->assertOk();
    }

    public function testParagraphBlock()
    {
        $markdown = "this is a test";

        $this->createRoute($markdown);

        $response = $this->get('/');

        $response->assertSee(<<<HTML
<p>this is a test</p>
HTML, false);
    }

    public function testBlockquote()
    {
        $markdown = <<<MARKDOWN
> Whatever you are, be a good one. -Abraham Lincoln
MARKDOWN;

        $this->createRoute($markdown);

        $response = $this->get('/');

        $response->assertSee(<<<HTML
<blockquote>
    <p>Whatever you are, be a good one. -Abraham Lincoln</p>
</blockquote>
HTML, false);
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