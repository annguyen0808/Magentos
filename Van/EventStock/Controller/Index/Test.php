<?php
namespace Van\EventStock\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{

	protected $_product;
    protected $_stockItemRepository;

        public function __construct(
			\Magento\Framework\App\Action\Context $context,
            \Magento\Catalog\Model\ProductRepository  $product,
            \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,
            \Magento\Checkout\Model\Cart $cart
            
        )
        {     
            $this->_stockItemRepository = $stockItemRepository;
            $this->_product=$product;   
			$this->_cart=$cart;
			return parent::__construct($context);
            
        }
	public function execute()
	{
		echo "dddđ";
		$a=13;
		$StockState= $this->_stockItemRepository->get($a);

	
	}
}