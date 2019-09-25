<?php
namespace Van\Featured\Model\ResourceModel\Featured;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'featured_id';
	protected $_eventPrefix = 'an_featured_product_collection';
	protected $_eventObject = 'featured_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Van\Featured\Model\Featured', 'Van\Featured\Model\ResourceModel\Featured');
	}
}