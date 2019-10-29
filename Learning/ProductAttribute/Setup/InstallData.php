<?php

namespace Learning\ProductAttribute\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    
    private $eavSetupFactory;

   
    private $categorySetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory,CategorySetupFactory $categorySetupFactory
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->categorySetupFactory = $categorySetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup,ModuleContextInterface $context
    ) {
        $setup = $setup;

        $setup->startSetup();


        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $categorySetup = $this->categorySetupFactory->create(['setup' => $setup]);

        /**
         * Insert/Create a simple text attribute
         */
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'chapagain_attribute_text_1',
            [
                'type' => 'text',
                'backend' => '',
                'frontend' => '',
                'label' => 'My Custom Text',
                'input' => 'text',
                'class' => '',
                'source' => '',
                'frontend' => 'Learning\ProductAttribute\Model\Attribute\Frontend\Material',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL, // can also use \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE, // scope of the attribute (global, store, website)
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'is_html_allowed_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );

                /**
         * Insert/Create a simple multiselect attribute
         */
                $eavSetup->addAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,
                    'chapagain_attribute_multidelect_1',
                    [
                        'type' => 'text',
                        'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                        'label' => 'My Custom MultiSelect',
                        'input' => 'multiselect',
                        'class' => '',
                        'source' => 'Learning\ProductAttribute\Model\Config\Source\MyCustomOptions',
                        'frontend' => 'Learning\ProductAttribute\Model\Attribute\Frontend\Material',
                        'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL, // can also use \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE, // scope of the attribute (global, store, website)
                        'visible' => true,
                        'wysiwyg_enabled' => true,
                        'required' => true,
                        'user_defined' => false,
                        'default' => '',
                        'searchable' => false,
                        'filterable' => false,
                        'comparable' => false,
                        'visible_on_front' => true,
                        'is_html_allowed_on_front' => true,
                        'used_in_product_listing' => true,
                        'unique' => false,
                        'apply_to' => ''
                    ]
                );


         //         * Insert/Create a simple multiselect attribute
         // */
                $eavSetup->addAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,
                    'chapagain_attribute_textarea_1',
                    [
                        'type' => 'text',
                        'backend' => '',
                        'label' => 'My Custom TextArea',
                        'input' => 'textarea',
                        'class' => '',
                        'source' => '',
                        'frontend' => 'Learning\ProductAttribute\Model\Attribute\Frontend\Material',
                        'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL, // can also use \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE, // scope of the attribute (global, store, website)
                        'visible' => true,
                        'wysiwyg_enabled' => true,
                        'required' => true,
                        'user_defined' => false,
                        'default' => '',
                        'searchable' => false,
                        'filterable' => false,
                        'comparable' => false,
                        'visible_on_front' => true,
                        'is_html_allowed_on_front' => true,
                        'used_in_product_listing' => true,
                        'unique' => false,
                        'apply_to' => ''
            ]
        );



                /**
         * Insert/Create a simple select yes/no attribute
         */
                $eavSetup->addAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,
                    'chapagain_attribute_select_yes_no_1',
                    [
                        'type' => 'text',
                        'backend' => '',
                        'label' => 'My Custom Select Yes/No',
                        'input' => 'select',
                        'class' => '',
                        'source' => 'Learning\ProductAttribute\Model\Config\Source\YesNo',
                        'frontend' => 'Learning\ProductAttribute\Model\Attribute\Frontend\Material',
                        'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL, // can also use \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE, // scope of the attribute (global, store, website)
                        'visible' => true,
                        'required' => true,
                        'user_defined' => false,
                        'default' => '',
                        'searchable' => false,
                        'filterable' => false,
                        'comparable' => false,
                        'visible_on_front' => true,
                        'is_html_allowed_on_front' => true,
                        'used_in_product_listing' => true,
                        'unique' => false,
                        'apply_to' => ''
                    ]
                );

        /**
         * Insert/Create a seletbox attribute with custom options
         */
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'chapagain_attribute_select_1',
            [
                'type' => 'text', // data type to be saved in database table
                'backend' => '',
                'frontend' => '',
                'label' => 'My Custom Selectbox',
                'input' => 'select', // form element type displayed in the form
                'class' => '',
                'source' => 'Learning\ProductAttribute\Model\Config\Source\MyCustomOptions',
                'frontend' => 'Learning\ProductAttribute\Model\Attribute\Frontend\Material',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL, // can also use \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE, // scope of the attribute (global, store, website)
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'is_html_allowed_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        // get default attribute set id
        $attributeSetId = $categorySetup->getDefaultAttributeSetId(\Magento\Catalog\Model\Product::ENTITY);
        $attributeGroupName = 'My Custom Group';

        // your custom attribute group/tab
        $categorySetup->addAttributeGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeSetId,
            $attributeGroupName, // attribute group name
            100 // sort order
        );

        // add attribute to group
        $categorySetup->addAttributeToGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeSetId,
            $attributeGroupName, // attribute group
            'chapagain_attribute_text_1', // attribute code
            10 // sort order
        );

        // add attribute to group
        $categorySetup->addAttributeToGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeSetId,
            $attributeGroupName, // attribute group
            'chapagain_attribute_select_1', // attribute code
            20 // sort order
        );

        $categorySetup->addAttributeToGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeSetId,
            $attributeGroupName, // attribute group
            'chapagain_attribute_select_yes_no_1', // attribute code
            30 // sort order
        );
        $categorySetup->addAttributeToGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeSetId,
            $attributeGroupName, // attribute group
            'chapagain_attribute_multidelect_1', // attribute code
            40 // sort order
        );

        $categorySetup->addAttributeToGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeSetId,
            $attributeGroupName, // attribute group
            'chapagain_attribute_textarea_1', // attribute code
            50 // sort order
        );

        $setup->endSetup();
    }
}