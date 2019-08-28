<?php

namespace Antt\Test\Controller\Adminhtml\Post;

class Edit extends \Antt\Test\Controller\Adminhtml\Post
{
    protected $_coreRegistry = null;
    protected $_postRepository;
    protected $_postFactory;
    protected $_sessionFactory;

    public function __construct(\Magento\Backend\App\Action\Context $context, 
    \Magento\Framework\Registry $coreRegistry, 
    \Antt\Test\Model\PostRepository $postRepository, 
    \Antt\Test\Model\PostFactory $postFactory, 
    \Magento\Backend\Model\Session $sessionFactory)
    {
        $this->_coreRegistry = $coreRegistry;
        $this->_postRepository = $postRepository;
        $this->_postFactory = $postFactory;
        $this->_sessionFactory = $sessionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        // echo "this is edit";
        // die();
        $id = $this->getRequest()->getParam('id');
        
        $model = $this->_postFactory->create();

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This item no longer exists.'));
                $this->_redirect('test/*/');
                return;
            }
        }

        $data = $this->_sessionFactory->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        $this->_coreRegistry->register('test_post', $model);

        $this->_initAction()->_addBreadcrumb(
            $id ? __('Edit %1', $model->getName()) : __('New Item'),
            $id ? __('Edit %1', $model->getName()) : __('New Item')
        )->_addContent(
            $this->_view->getLayout()->createBlock('Antt\Test\Block\Adminhtml\Edit')
        );
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Posts_test'));
        $this->_view->getPage()->getConfig()->getTitle()->prepend(
            $model->getId() ? $model->getName() : __('New Item')
        );
        $this->_view->renderLayout();
    }
}