<?php

declare(strict_types=1);

namespace MageSuite\Category\Model\Attribute\Source;

class HeadlineHtmlTag extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    public function getAllOptions(): array
    {
        return [
            ['label' => '<h1>', 'value' => 'h1'],
            ['label' => '<h2>', 'value' => 'h2'],
            ['label' => '<h3>', 'value' => 'h3'],
            ['label' => '<h4>', 'value' => 'h4'],
            ['label' => '<h5>', 'value' => 'h5'],
            ['label' => '<h6>', 'value' => 'h6'],
        ];
    }
}
