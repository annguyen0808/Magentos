<?php
namespace Antt\Test\Block;
class Create extends \Magento\Framework\View\Element\Template
{
	private $postFactory;
	private $postRepository;
	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Antt\Test\Model\PostFactory $postFactory,
        \Antt\Test\Model\PostRepository $postRepository
          )
	{
		parent::__construct($context);
		$this->postFactory = $postFactory;
		$this->postRepository = $postRepository;
	}
}