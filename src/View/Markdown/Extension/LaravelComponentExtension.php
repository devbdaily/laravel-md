<?php

namespace DevBDaily\LaravelMD\View\Markdown\Extension;

use DevBDaily\LaravelMD\View\Markdown\Block\Renderer;
use League\CommonMark\Block\Element as CoreBlockElement;
use League\CommonMark\Block\Parser as CoreBlockParser;
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
            ->addBlockParser(new CoreBlockParser\BlockQuoteParser(), 70)
            
            ->addBlockRenderer(CoreBlockElement\Document::class, new CoreBlockRenderer\DocumentRenderer(), 0)
            ->addBlockRenderer(CoreBlockElement\Paragraph::class, new Renderer\ParagraphRenderer(), 0)
            ->addBlockRenderer(CoreBlockElement\BlockQuote::class, new Renderer\BlockQuoteRenderer(), 0)

            ->addInlineRenderer(CoreInlineElement\Text::class, new CoreInlineRenderer\TextRenderer(), 0)
        ;
    }
}