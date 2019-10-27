<?php

namespace Mageplaza\Blog\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class WidgetGritList implements ArrayInterface
{

    public function toOptionArray()
    {
        return [
            ['value'=>'grit','label'=>__('Grit')],
            ['value'=>'list','label'=>__('List')]
        ];

    }
}