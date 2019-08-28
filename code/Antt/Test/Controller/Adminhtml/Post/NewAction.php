<?php

namespace Antt\Test\Controller\Adminhtml\Post;

class NewAction extends \Antt\Test\Controller\Adminhtml\Post
{
    public function execute()
    {
        $this->_forward('edit');
    }
}