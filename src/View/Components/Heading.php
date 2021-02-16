<?php

namespace DevBDaily\LaravelMD\View\Components;

use Illuminate\View\Component;

class Heading extends Component
{
    /**
     * The base name of the component view string
     * 
     * @var string
     */
    const COMPONENT_BASE_NAME = 'md::components.heading';

    /**
     * The heading level to render.
     *
     * @var string
     */
    protected $level;

    /**
     * The content of the component.
     *
     * @var string
     */
    protected $content;

    /**
     * Heading constructor.
     *
     * @param int $level
     * @param string $content
     */
    public function __construct(int $level, string $content)
    {
        $this->level = $level;
        $this->content = $content;
    }

    public function render()
    {
        return view($this->getViewName(), [
            'content' => $this->content,
        ]);
    }

    protected function getViewName(): string
    {
        return self::COMPONENT_BASE_NAME . $this->level;
    }
}