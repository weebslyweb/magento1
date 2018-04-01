<?php
class Weebsly_Catalog_Block_Product extends Mage_Catalog_Block_Product
{
die('is it working');
    public function getPrice()

    {
    	die('is it working');
        return $this->getProduct()->getPrice();
    }

    public function getFinalPrice()
    {
    	die('is it working');
        if (!isset($this->_finalPrice[$this->getProduct()->getId()])) {
            $this->_finalPrice[$this->getProduct()->getId()] = $this->getProduct()->getFinalPrice();
        }
        return $this->_finalPrice[$this->getProduct()->getId()];
    }

    public function getPriceHtml($product)
    {
    	die('is it working');
        $this->setTemplate('catalog/product/price.phtml');
        $this->setProduct($product);
        return $this->toHtml();
    }
}
