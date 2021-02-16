<?php

namespace Tests\DevBDaily\LaravelMD\Feature\View\Components;

use DevBDaily\LaravelMD\View\Components\Heading;
use Illuminate\Support\Facades\View;
use Tests\DevBDaily\LaravelMD\Feature\LaravelMDTestCase;

class HeadingTest extends LaravelMDTestCase
{
    /**
     * @dataProvider renderViewDataProvider
     *
     * @param int $level
     * @param string $view
     * @return void
     */
    public function testRenderReturnsCorrectView(int $level, string $view)
    {
        View::shouldReceive('make')
            ->with($view, ['content' => ''], [])
            ->once();

        $heading = new Heading($level, '');

        $heading->render();
    }

    /**
     * Returns render view based on constructor args
     *
     * @return void
     */
    public function renderViewDataProvider()
    {
        return [
            [1, 'md::components.heading1'],
            [2, 'md::components.heading2'],
            [3, 'md::components.heading3'],
            [4, 'md::components.heading4'],
            [5, 'md::components.heading5'],
            [6, 'md::components.heading6'],
        ];
    }
}