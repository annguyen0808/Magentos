<?php
namespace AHT\Product\Block;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
class Index extends \Magento\Framework\View\Element\Template
{ 
    protected $_productCollectionFactory;
    protected $_productRepo;
    protected $_searchCriteri;
   
  
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context, 
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        ProductRepositoryInterface $repo,
        SearchCriteriaInterface $ser
        
    ) {
        $this->_productCollectionFactory = $productCollectionFactory; 
        $this->_productRepo=$repo;    
        $this->_searchCriteri=$ser;
        parent::__construct($context);
    }
  
    public function getProductCollection() {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3); // fetching only 3 products
        return $collection;
       //  $this->_searchCriteri->getPageSize(5);          
       // $collection=$this->_productRepo->getList($this->_searchCriteri);
       //    return $collection;
    }
}