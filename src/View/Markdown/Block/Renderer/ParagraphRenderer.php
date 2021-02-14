<?php

namespace DevBDaily\LaravelMD\View\Markdown\Block\Renderer;

use DevBDaily\LaravelMD\View\Components\Paragraph;
use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Element\Paragraph as ParagraphElement;
use League\CommonMark\Block\Renderer\BlockRendererInterface;
use League\CommonMark\ElementRendererInterface;

class ParagraphRenderer implements BlockRendererInterface
{
    /**
     * @param Paragraph                $block
     * @param ElementRendererInterface $htmlRenderer
     * @param bool                     $inTightList
     *
     * @return string
     */
    public function render(AbstractBlock $block, ElementRendererInterface $htmlRenderer, bool $inTightList = false)
    {
        if (!($block instanceof ParagraphElement)) {
            throw new \InvalidArgumentException('Incompatible block type: ' . \get_class($block));
        }

        if ($inTightList) {
            return $htmlRenderer->renderInlines($block->children());
        }

        $component = new Paragraph($htmlRenderer->renderInlines($block->children()));

        return $component->render();
    }
}