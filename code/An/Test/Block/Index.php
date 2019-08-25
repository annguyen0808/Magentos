<?php 
namespace An\Test\Block;
//cấu hình đường dẫn cho phép liên k
class Index extends \Magento\Framework\View\Element\Template
{  

	// public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	// {
	// 	return parent::__construct($context);	
	// }
	
  
private $postFactory;
private $postRepository;

public function __construct(
	\Magento\Framework\View\Element\Template\Context $context, 
	\An\Test\Model\PostRepository $postRepos,
	 \An\Test\Model\PostFactory $postFactory )
	 
	 {

         parent::__construct($context);
		$this->postFactory = $postFactory;
		$this->postRepository = $postRepos;
}

	public function getPosts()
	{
		$collection = $this->postRepository->getList();
		// $collection = $post->getCollection();
		return $collection;
	}

}
?>