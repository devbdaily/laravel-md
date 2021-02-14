<?php

namespace DevBDaily\LaravelMD\View\Markdown\Block\Renderer;

use DevBDaily\LaravelMD\View\Components\BlockQuote;
use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Element\BlockQuote as  BlockQuoteElement;
use League\CommonMark\Block\Renderer\BlockRendererInterface;
use League\CommonMark\ElementRendererInterface;

class BlockQuoteRenderer implements BlockRendererInterface
{
    /**
     * @param BlockQuote               $block
     * @param ElementRendererInterface $htmlRenderer
     * @param bool                     $inTightList
     *
     * @return string
     */
    public function render(AbstractBlock $block, ElementRendererInterface $htmlRenderer, bool $inTightList = false)
    {
        if (!($block instanceof BlockQuoteElement)) {
            throw new \InvalidArgumentException('Incompatible block type: ' . \get_class($block));
        }

        $attrs = $block->getData('attributes', []);

        $filling = $htmlRenderer->renderBlocks($block->children());
        $component = new BlockQuote($filling);
        return $component->render();
    }
}