<?php

namespace Tests\DevBDaily\LaravelMD\Feature;

use Illuminate\Support\Facades\Route;
use InvalidArgumentException;

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

    public function testHeadingMarkdownRendersComponent()
    {
        $this->withoutExceptionHandling();
        $markdown = <<<MARKDOWN
# Heading 1
## Heading 2
### Heading 3
#### Heading 4
##### Heading 5
###### Heading 6
MARKDOWN;

        $this->createRoute($markdown);

        $response = $this->get('/');

        $response->assertSee(<<<HTML
<h1>Heading 1</h1>
<h2>Heading 2</h2>
<h3>Heading 3</h3>
<h4>Heading 4</h4>
<h5>Heading 5</h5>
<h6>Heading 6</h6>
HTML, false);
    }

    public function testHeadingMarkdownLimitsHeadingLevel()
    {
        $markdown = <<<MARKDOWN
####### Bad Heading
MARKDOWN;

        $this->createRoute($markdown);

        $response = $this->get('/');

        $response->assertDontSee(<<<HTML
<h7>Bad Heading</h7>
HTML, false);
        $response->assertSee(<<<HTML
<p>####### Bad Heading</p>
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