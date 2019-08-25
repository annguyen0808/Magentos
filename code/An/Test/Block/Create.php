<?php
namespace An\Test\Block;
class Create extends \Magento\Framework\View\Element\Template
{
	private $postFactory;
	private $postRepository;
	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \An\Test\Model\PostFactory $postFactory,
        \An\Test\Model\PostRepository $postRepository
          )
	{
		parent::__construct($context);
		$this->postFactory = $postFactory;
		$this->postRepository = $postRepository;
	}
}