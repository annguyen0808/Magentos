<?php
namespace Robin\Banner\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

class Index extends Action{


    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        // parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        return parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
      
        // $resultPage = $this->resultPageFactory->create();
        // $Collection = $resultPage->getCollection();
        // $data=$Collection->getData();
        // var_dump($data);
       
        // exit();
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Robin_Banner::banner_manager');
        $resultPage->getConfig()->getTitle()->prepend(__('Banner Banner'));//cài đặt tiêu đề

        return $resultPage;
    }
}