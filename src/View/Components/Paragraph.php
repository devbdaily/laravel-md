<?php

namespace DevBDaily\LaravelMD\View\Components;

use Illuminate\View\Component;

class Paragraph extends Component
{
    /**
     * The content of the component.
     *
     * @var string
     */
    public $content;

    /**
     * Paragraph Constructor.
     *
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * Get the view / view contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\Support\Htmlable|\Closure|string
     */
    public function render()
    {
        return view('md::components.paragraph', [
            'content' => $this->content,
        ]);
    }
}