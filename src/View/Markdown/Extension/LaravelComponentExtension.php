<?php

namespace DevBDaily\LaravelMD\View\Markdown\Extension;

use League\CommonMark\Block\Element as CoreBlockElement;
use League\CommonMark\Block\Renderer as CoreBlockRenderer;
use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Inline\Element as CoreInlineElement;
use League\CommonMark\Inline\Renderer as CoreInlineRenderer;

class LaravelComponentExtension implements ExtensionInterface
{
    /**
     * Register parts of the environment.
     *
     * @param \League\CommonMark\ConfigurableEnvironmentInterface $environment
     * @return void
     */
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment
            ->addBlockRenderer(CoreBlockElement\Document::class, new CoreBlockRenderer\DocumentRenderer(), 0)
            ->addBlockRenderer(CoreBlockElement\Paragraph::class, new CoreBlockRenderer\ParagraphRenderer(), 0)

            ->addInlineRenderer(CoreInlineElement\Text::class, new CoreInlineRenderer\TextRenderer(), 0)
        ;
    }
}