<?php
// checkout_cart_product_add_after event magento 2
namespace Van\EventStock\Observer;

    use Magento\Framework\Event\ObserverInterface;
    use Magento\Framework\App\RequestInterface;
    
class AfterAddProduct implements ObserverInterface
{
   
    protected $_product;
    protected $_stockItemRepository;

        public function __construct(
            \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
            \Magento\Catalog\Model\ProductFactory  $product,
            \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,
            \Magento\Checkout\Model\Cart $cart,
            \Psr\Log\LoggerInterface $logger
        )
        {   
            $this->productRepository = $productRepository;
            $this->_stockItemRepository = $stockItemRepository;
            $this->_product=$product;   
            $this->_cart=$cart;
            $this->_logger = $logger;
        }

       public function execute(\Magento\Framework\Event\Observer $observer) {    

        $storeId=0;
        $item = $observer->getEvent()->getData('quote_item');	
        
        $product_id=$item->getProductId();
        $qty_crat=$item->getQty();

       // $product = $this->productRepository->getById($product_id);

        $StockState= $this->_stockItemRepository->get($product_id);
       $product=$this->_product->create()->load($product_id);

        $qty = $StockState->getQty();   

        $product_cart=$qty - $qty_crat;    
        if($product_cart == 0){
               $product->setStatus(2)->save();
                // $product->setStatus(\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_DISABLED);
                // $this->productRepository->save($product);
             }

             $this->_logger->info($product_id);
        $this->_logger->info($qty_crat);
    //     exit();
        $this->_logger->info($product->getStatus());
        $this->_logger->info($StockState->getIsInStock());
        $this->_logger->info($qty);


       // $this->_logger->info($item->getQty());


   
     
//    print_r($stockItem->getQty()); 

        
        // $items = $this->_cart->getQuote()->getAllVisibleItems();
        // foreach($items as $item) {

        //     $this->_logger->alert($item->getQty());
            
           
        // }

        // $this->_logger->info()
            // $item = $observer->getEvent()->getData('quote_item');	 
            // $this->_logger->info($item->getCustomPrice()); 

            // $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
           
            // $price = 100; //set your price here
            // $item->setCustomPrice($price);
            // $item->setOriginalCustomPrice($price);
            // $item->getProduct()->setIsSuperMode(true);
                  
                  
		}
  
}