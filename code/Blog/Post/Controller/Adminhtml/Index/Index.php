<?php
namespace Blog\Post\Controller\Adminhtml\Index;

class Index extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;
    protected $ContactFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Blog\Post\Model\ContactFactory $ContactFactory
        )
        
    {
        $this->ContactFactory=$ContactFactory;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        // // echo "dsfs";
        //   $allnews = $this->ContactFactory->create();
        //   $newsCollection = $allnews->getCollection();
        //   var_dump($newsCollection->getData());
        //   die();
        return $this->resultPageFactory->create();
    }
}