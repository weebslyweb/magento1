<?php 
class Weebsly_Cprice_Model_Observer
{
	public function setcustomprice(Varien_Event_Observer $observer) {
                      
        $item = $observer->getQuoteItem();
        // Check if Product have parent item.
        $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
      
        // This is for add the Custom Information about Product Item
        $additionalDetail = array(array(
         'code' => 'custom_details',
         'label' => 'This text is displayed through additional options',
         'value' => 'ID is ' . $item->getProductId() . ' and SKU is ' . $item->getSku()
         ));
         $item->addOption(array(
         'code' => 'additional_options',
         'value' => serialize($additionalOptions),
         ));
        
        // Load the custom price
        $price = 123; //Here, set the Custom Price for Item
        // Set the custom price
        $item->setCustomPrice($price); // This set the Custom Price in Quote of cart
        $item->setOriginalCustomPrice($price);
        // Enable super mode on the product.
        $item->getProduct()->setIsSuperMode(true); 

        }
}
