<?php

namespace Antt\Test\Controller\Adminhtml;

use Magento\Backend\App\Action;

abstract class Post extends Action
{
    protected function _initAction()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu(
            'Antt_Test::test'
        )->_addBreadcrumb(
            __('Test'),
            __('Test')
        );
        return $this;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Antt_Test::test');
    }
}
