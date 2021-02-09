<?php

namespace DevBDaily\LaravelMD\View\Markdown;

use League\CommonMark\CommonMarkConverter;

class Markdown
{
    /**
     * The CommonMark Converter instance.
     *
     * @var \League\CommonMark\CommonMarkConverter
     */
    protected $converter;

    /**
     * Markdown service constructor.
     *
     * @param \League\CommonMark\CommonMarkConverter $converter
     */
    public function __construct(CommonMarkConverter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * Parse the given markdown string into html.
     *
     * @param string $string
     * @return string
     */
    public function parse(string $string): string
    {
        return $this->converter->convertToHtml($string);
    }
}
