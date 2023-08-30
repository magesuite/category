<?php

declare(strict_types=1);

namespace MageSuite\Category\Model\Attribute\Source;

class HideHeadline extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    public function getAllOptions(): array
    {
        return [
            ['label' => __('No'), 'value' => 0],
            ['label' => __('Yes'), 'value' => 1],
        ];
    }
}
