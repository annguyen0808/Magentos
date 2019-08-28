<?php

namespace Antt\Test\Controller\Adminhtml\Post;

class Index extends \Antt\Test\Controller\Adminhtml\Post
{

    public function execute()
    {
        $this->_initAction();
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Posts_Tets'));
        $this->_view->renderLayout();
    }

}