<?php

declare(strict_types=1);

namespace MageSuite\Category\Setup\Patch\Data;

class AddHideHeadlineAttribute implements \Magento\Framework\Setup\Patch\DataPatchInterface,
                                               \Magento\Framework\Setup\Patch\PatchRevertableInterface
{
    protected \Magento\Eav\Setup\EavSetup $eavSetup;

    public function __construct(
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory,
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetupInterface
    ) {
        $this->eavSetup = $eavSetupFactory->create(['setup' => $moduleDataSetupInterface]);
    }

    public function apply(): void
    {
        $this->eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            \MageSuite\ThemeHelpers\Block\Category\View\Headline::ATTRIBUTE_HIDE_HEADLINE,
            [
                'type' => 'int',
                'label' => 'Hide Headline',
                'input' => 'select',
                'visible' => true,
                'required' => false,
                'sort_order' => 160,
                'source' => \MageSuite\Category\Model\Attribute\Source\HideHeadline::class,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'group' => 'Display Settings'
            ]
        );
    }

    public function revert(): void
    {
        $this->eavSetup->removeAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            \MageSuite\ThemeHelpers\Block\Category\View\Headline::ATTRIBUTE_HIDE_HEADLINE
        );
    }

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }
}
