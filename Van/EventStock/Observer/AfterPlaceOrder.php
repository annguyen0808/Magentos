<?php

namespace Van\EventStock\Observer;

    use Magento\Framework\Event\ObserverInterface;
    
    
    
class AfterPlaceOrder implements ObserverInterface
{
   
    protected $_product;
    protected $_stockItemRepository;
 
        public function __construct(
            \Magento\Catalog\Model\ProductFactory  $product,
            \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,
            \Magento\Checkout\Model\Cart $cart,
        
            \Psr\Log\LoggerInterface $logger
           
        )
        {   
            $this->_stockItemRepository = $stockItemRepository;
            $this->_product=$product;   
            $this->_cart=$cart;
           
            $this->_logger = $logger;
           
        }

       public function execute(\Magento\Framework\Event\Observer $observer) {
       
        $orderIds = $observer->getEvent()->getData('order_ids');
        $orderId = $orderIds[0];
   
        $this->_logger->info($orderId);
      
         

        

     
  
       

      
        
      

        
    }
}