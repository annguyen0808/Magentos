<?php 
namespace AHT\Blog\Block;

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
	\AHT\Blog\Model\PostRepository $postRepos,
     \AHT\Blog\Model\PostFactory $postFactory){
         parent::__construct($context);
		$this->postFactory = $postFactory;
		$this->postRepository = $postRepos;
}



   public function getBlogInfo()
	{
		return __('AHT Blog module');
	}
	public function getPosts()
	{
		$collection = $this->postRepository->getList();
		// $collection = $post->getCollection();
		return $collection;
	}

}
?>