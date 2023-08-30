<?php

declare(strict_types=1);

namespace MageSuite\Category\Setup\Patch\Data;

class AddHeadlineHtmlTagAttribute implements \Magento\Framework\Setup\Patch\DataPatchInterface, \Magento\Framework\Setup\Patch\PatchRevertableInterface
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
            \MageSuite\ThemeHelpers\Block\Category\View\Headline::ATTRIBUTE_HEADLINE_HTML_TAG,
            [
                'type' => 'varchar',
                'label' => 'Headline HTML Tag',
                'input' => 'select',
                'visible' => true,
                'required' => false,
                'sort_order' => 150,
                'source' => \MageSuite\Category\Model\Attribute\Source\HeadlineHtmlTag::class,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'group' => 'Display Settings'
            ]
        );
    }

    public function revert(): void
    {
        $this->eavSetup->removeAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            \MageSuite\ThemeHelpers\Block\Category\View\Headline::ATTRIBUTE_HEADLINE_HTML_TAG
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
