<?php

namespace Van\Featured\Block\Adminhtml\Featured\Edit;

use Magento\Backend\Block\Widget\Context;

class GenericButton
{
    
    protected $context;
    protected $featuredFactory;

    public function __construct(
        Context $context,
        \Van\Featured\Model\FeaturedFactory $featuredFactory
    )
    {
        $this->context = $context;
        $this->featuredFactory = $featuredFactory;
    }

    /**
     * Return Banner ID
     */
    public function getFeaturedId()
    {
        $id = $this->context->getRequest()->getParam('featured');
        $featured = $this->bannerFactory->create()->load($id);
        if ($featured->getId())
            return $id;
        return null;
    }

    /**
     * Generate url by route and parameters
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
