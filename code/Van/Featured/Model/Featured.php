<?php
namespace Van\featured\Model;

use Van\Featured\Api\Data\FeaturedInterface;

class Featured extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, FeaturedInterface
{
    const CACHE_TAG = 'an_featured_product';

	protected $_cacheTag = 'an_featured_product'; //một định danh duy nhất để sử dụng trong bộ nhớ đệm

    protected $_eventPrefix = 'an_featured_product'; 
    
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    

    protected function _construct()
    {

        $this->_init('Van\Featured\Model\ResourceModel\Featured');
    }

    public function getIdentities()
	{
		//Trả lại (các) ID duy nhất cho từng đối tượng trong hệ thống
		return [self::CACHE_TAG . '_' . $this->getId()];
    }
    
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }


}