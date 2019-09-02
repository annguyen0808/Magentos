<?php
namespace Blog\Post\Model;

use Blog\Post\Api\Data\ContactInterface;

class Contact extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, ContactInterface
{
    const CACHE_TAG = 'aht_blog_contact';

	protected $_cacheTag = 'aht_blog_contact'; //một định danh duy nhất để sử dụng trong bộ nhớ đệm

    protected $_eventPrefix = 'aht_blog_contact'; 
    

    protected function _construct()
    {

        $this->_init('Blog\Post\Model\ResourceModel\Contact');
    }

    public function getIdentities()
	{
		//Trả lại (các) ID duy nhất cho từng đối tượng trong hệ thống
		return [self::CACHE_TAG . '_' . $this->getId()];
    }
    
    public function getDefaultValues()
	{
		$values = [];

		return $values;
	}


}