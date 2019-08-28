<?php
namespace Antt\Test\Block\Adminhtml;
//  Block sẽ kế thùa từ \Magento\Backend\Block\Widget\Grid và định nghĩa một số biến trong hàm _contruct()

// _blockGroup: tên module

// _controller đường dẫn tới Grid block

// _headerText title của page block

// _addbuttonLabel: label của button Add New Post

class Post extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
        $this->_blockGroup = 'Antt_Test';
		$this->_controller = 'adminhtml_post';
		$this->_headerText = __('Posts');
		$this->_addButtonLabel = __('Create New Post');
		parent::_construct();
	}
}