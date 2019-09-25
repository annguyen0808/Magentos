<?php
namespace Van\Featured\Controller\Adminhtml\Index;

use Van\Featured\Model\Featured as Featured;


class Delete extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Van_Featured::seve';

    protected $resultPageFactory;
    protected $featuredFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Van\Featured\Model\FeaturedFactory $featuredFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->featuredFactory = $featuredFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $featured = $this->featuredFactory->create()->load($id);

        if(!$featured)
        {
            $this->messageManager->addError(__('Unable to process. please, try again.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/', array('_current' => true));
        }

        try{
            $featured->delete();
            $this->messageManager->addSuccess(__('Your featured has been deleted !'));
        }
        catch(\Exception $e)
        {
            $this->messageManager->addError(__('Error while trying to delete featured'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', array('_current' => true));
    }
}