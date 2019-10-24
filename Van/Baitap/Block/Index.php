<?php

namespace Van\Baitap\Block;

Class Index extends \Magento\Framework\View\Element\Template
{
	protected $dataHelper;
	
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Van\Baitap\Helper\Data $dataHelper,
		\Magento\Store\Model\StoreManagerInterface $storeManager
	){
		parent::__construct($context);
		$this->dataHelper = $dataHelper;
		$this->_storeManager = $storeManager;
	}
	
	public function getTitle()
	{
		$title = $this->dataHelper->getGeneralConfig('title');
		
		return $title;
	}
	

	public function getTextarea()
	{
		$textarea = $this->dataHelper->getGeneralConfig('textarea');
		
		return $textarea;
	}
	

	public function getImage()
	{
		$image = $this->dataHelper->getGeneralConfig('image');
		
		return $this->getUrlMedia().$image;
	}


	public function getBaseUrl()
	{
		return $this->_storeManager->getStore()->getBaseUrl();
	}

	public function getUrlMedia()
	{
         $mediaUrl = $this ->_storeManager-> getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA );
         return $mediaUrl."baitap/";
	}
}