<?php

namespace DevBDaily\LaravelMD\View\Markdown;

class Markdown
{
    /**
     * The markdown configuration.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Markdown service constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    /**
     * Parse the given markdown string into html.
     *
     * @param string $string
     * @return string
     */
    public function parse(string $string)
    {
        return $string;
    }
}
