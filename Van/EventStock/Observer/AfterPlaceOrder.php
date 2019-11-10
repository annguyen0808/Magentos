<?php

namespace Van\EventStock\Observer;

    use Magento\Framework\Event\ObserverInterface;
    // use Magento\InventorySalesAdminUi\Model\GetSalableQuantityDataBySku;
    
class AfterPlaceOrder implements ObserverInterface
{
    protected $_logger;
    private $getSalableQuantityDataBySku;
    public function __construct(
      
    \Magento\Catalog\Model\ProductFactory  $product,
    \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,
    \Psr\Log\LoggerInterface $logger //log injection
    // GetSalableQuantityDataBySku $getSalableQuantityDataBySku

    ) {

    $this->_stockItemRepository = $stockItemRepository;
    $this->_product=$product; 
    $this->_logger = $logger;
    // $this->getSalableQuantityDataBySku = $getSalableQuantityDataBySku;

       // parent::__construct($data);
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    { 

     
     $order = $observer->getEvent()->getOrder();
     $order_id = $order->getIncrementId();
     $this->_logger->info($order_id);
    

     //product id and name
     foreach($order->getAllItems() as $item)
        {
          $ProdustIds[]= $item->getProductId();
          $proName[] = $item->getName(); // product name
        }
        
     foreach($ProdustIds as $id)
        {
          $StockState= $this->_stockItemRepository->get($id);
          $product=$this->_product->create()->load($id);
          // $sku=$product->getSku();

          // $salable = $this->getSalableQuantityDataBySku->execute($sku);
          // $this->_logger->info(print_r($salable,true));

         
          $StockQty=$StockState->getQty();
          if($StockQty==0){
            // $product->setStatus(2)->save();
            $product->setStatus(\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_DISABLED)->save();
           
          }
         
          // $this->_logger->info($product->getIsInStock());
          $this->_logger->info($StockState->getIsInStock());
          $this->_logger->info($StockState->getQty());
        
          
         // $this->_logger->info($id);
        }

    //  foreach($proName as $name)
    //     {
    //       $this->_logger->info($name);
    //     }
     


    
    }
}