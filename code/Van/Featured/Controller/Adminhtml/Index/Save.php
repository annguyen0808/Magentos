<?php
namespace An\Featured\Controller\Adminhtml\Index;

use Van\Featured\Model\Featured;
class Save extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Van_Featured::save';

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
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if($data)
        {
            if (isset($data['is_featured']) && $data['is_featured'] === 'true') {
                $data['is_featured'] = Featured::STATUS_ENABLED;
            }
            try{
                $id = $data['featured_id'];

                $featured = $this->featuredFactory->create()->load($id);

                $data = array_filter($data, function($value) {return $value !== ''; });

                $featured->setData($data);
                $featured->save();
                $this->messageManager->addSuccess(__('Successfully saved the item.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('*/*/');
            }
            catch(\Exception $d)
            {
                $this->messageManager->addError($e->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/*/edit', ['id' => $featured->getId()]);
            }
        }

         return $resultRedirect->setPath('*/*/');
    }
}