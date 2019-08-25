<?php
namespace An\Test\Model;

use An\Test\Api\Data\PostInterface;

class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, PostInterface
{
    const CACHE_TAG = 'an_test_post';

	protected $_cacheTag = 'an_test_post'; //một định danh duy nhất để sử dụng trong bộ nhớ đệm

    protected $_eventPrefix = 'an_test_post'; 
    

    protected function _construct()
    {

        $this->_init('An\Test\Model\ResourceModel\Post');
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