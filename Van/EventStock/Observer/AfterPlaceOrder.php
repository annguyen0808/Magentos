<?php

namespace Van\EventStock\Observer;

    use Magento\Framework\Event\ObserverInterface;
    use Magento\Framework\App\RequestInterface;
    
class AfterPlaceOrder implements ObserverInterface
{
   
       public function execute(\Magento\Framework\Event\Observer $observer) {

        //    $item = $observer->getEvent()->getData('quote_item');	 
           
        
        //     $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
		// 	$price = 100; //set your price here
		// 	$item->setCustomPrice($price);
		// 	$item->setOriginalCustomPrice($price);
        //     $item->getProduct()->setIsSuperMode(true);
            

            $storeId = 0; //the admin store view, change this if you want to disable only for the store view from which the order came
             $order= $observer->getEvent()->getData('product');
             foreach ($order->getItemsCollection() as $item) {
                $stockQty = (int)Mage::getModel('cataloginventory/stock_item')->loadByProduct($item->getProductId())->getQty();
    
                if ($stockQty == 0) {
                    Mage::getModel('catalog/product_status')->updateProductStatus($item->getProductId(), $storeId, Mage_Catalog_Model_Product_Status::STATUS_DISABLED);
                }
            }
            // print

            
           
		}
  
}