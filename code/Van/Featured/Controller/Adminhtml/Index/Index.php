<?php
  namespace Van\Featured\Controller\Adminhtml\Index;

  class Index extends \Magento\Backend\App\Action
  {
    
    protected $resultPageFactory;
    protected $FeaturedFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Van\Featured\Model\FeaturedFactory $FeaturedFactory
    ) {
      
         $this->resultPageFactory = $resultPageFactory;
         $this->FeaturedFactory=$FeaturedFactory;
         parent::__construct($context);
    }

    public function execute()

    {
      $resultPage = $this->resultPageFactory->create();
      $resultPage->setActiveMenu('Van_Featured::featured_manager');
      $resultPage->getConfig()->getTitle()->prepend(__('Featured Product'));//cài đặt tiêu đề
      return $resultPage;
    }
  }
?>