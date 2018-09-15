<?php

namespace MageSuite\Category\Helper;

class Category
{
    /**
     * @var \MageSuite\Category\Model\ResourceModel\Category
     */
    protected $categoryResourceModel;

    public function __construct(\MageSuite\Category\Model\ResourceModel\Category $categoryResourceModel)
    {
        $this->categoryResourceModel = $categoryResourceModel;
    }

    /**
     * @param $category \Magento\Catalog\Model\Category
     * @return mixed
     */
    public function getProductCount(\Magento\Catalog\Model\Category $category)
    {
        return $this->categoryResourceModel->getProductCount($category);
    }
}