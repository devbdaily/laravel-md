<?php

namespace DevBDaily\LaravelMD\View\Markdown\Block\Renderer;

use DevBDaily\LaravelMD\View\Components\Heading;
use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Element\Heading as HeadingElement;
use League\CommonMark\Block\Renderer\BlockRendererInterface;
use League\CommonMark\ElementRendererInterface;

class HeadingRenderer implements BlockRendererInterface
{
    /**
     * @param Heading                  $block
     * @param ElementRendererInterface $htmlRenderer
     * @param bool                     $inTightList
     *
     * @return string
     */
    public function render(AbstractBlock $block, ElementRendererInterface $htmlRenderer, bool $inTightList = false)
    {
        if (!($block instanceof HeadingElement)) {
            throw new \InvalidArgumentException('Incompatible block type: ' . \get_class($block));
        }

        $tag = 'h' . $block->getLevel();

        $attrs = $block->getData('attributes', []);

        $component = new Heading($block->getLevel(), $htmlRenderer->renderInlines($block->children()));

        return $component->render();
    }
}