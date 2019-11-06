<?php
namespace Van\EventStock\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{

	// protected $_product;
    // protected $_stockItemRepository;

    //     public function __construct(
    //         \Magento\Catalog\Model\ProductRepository  $product,
    //         \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,
    //         \Magento\Checkout\Model\Cart $cart
            
    //     )
    //     {     
    //         $this->_stockItemRepository = $stockItemRepository;
    //         $this->_product=$product;   
    //         $this->_cart=$cart;
            
    //     }
	public function execute()
	{
	// //    echo "ddđ";
	// //    die();
	// 	$products = Mage::getModel('catalog/product')
	// 	->getCollection();
	// 	foreach ( $products as $product ) { 
	// 		echo $product->getSku();
	// 		echo $product->getStatus();
	// 		echo $product->getVisibility();
	// 	  }
	// 	  die();
		// $textDisplay = new \Magento\Framework\DataObject(array('text' => 'Demo'));
		// $StockState= $this->_stockItemRepository->get(1);
		// echo $StockState->getQty();
		// exit;
		// $this->_eventManager->dispatch('mageplaza_helloworld_display_text', ['demo_text' => $textDisplay]);
		// echo $textDisplay->getText();
		$productStatus=Mage::getModel('catalog/product')->setStoreId(1)->get(1);
		echo $productStatus->getStatus();
		// exit;
	}
}