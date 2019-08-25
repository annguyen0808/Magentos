<?php
namespace An\Test\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_postFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \An\Test\Model\PostFactory $postFactory
        )
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        // echo 'An blog';
        // die();
        // $post = $this->_postFactory->create();
		// $collection = $post->getCollection();
		// foreach($collection as $item){
		// 	echo "<pre>";
		// 	print_r($item->load(1)->getData());
		// 	echo "</pre>";
		// }
        // exit();
		return $this->_pageFactory->create();
        // return $this->_pageFactory->create();
        

    }
}