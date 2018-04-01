<?php
require_once(Mage::getModuleDir('controllers','Mage_Adminhtml').DS.'Catalog'.DS.'ProductController.php');
 
class Weebsly_Productcustomoptions_Adminhtml_Catalog_ProductController extends Mage_Adminhtml_Catalog_ProductController
{
	/**
	 * Initialize product before saving
	 */
	protected function _initProductSave()
	{
 
// ..
 
		$product->setCanSaveConfigurableAttributes(
			(bool) $this->getRequest()->getPost('affect_configurable_product_attributes')
			&& !$product->getConfigurableReadonly()
		);
// Inchoo
		$skuImageName=trim($product->getSku());
		$imagesFiles=$_FILES;
		$path = Mage::getBaseDir('media') . DS . 'catalog' . DS . 'customoption' .DS. 'images';
 
		foreach ($imagesFiles as $key=>$value)
		{
			$optionsValue = explode('-',$key);
			foreach ($value as $key2=>$value2)
			{
				if($key2=='name' && $value2!="") {
					try {
						$uploader = new Varien_File_Uploader($key);
						$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png','svg'));
						$uploader->setAllowRenameFiles(false);
						$uploader->setFilesDispersion(false);
						$optionTitle = trim($productData['options'][$optionsValue[0]]['title']);
						$optionValueTitle = trim($productData['options'][$optionsValue[0]]['values'][$optionsValue[1]]['title']);
						$imageExtension = pathinfo($value2,PATHINFO_EXTENSION);
						$newImageName =$skuImageName.'_'.$optionTitle.'_'.$optionValueTitle.'.'.$imageExtension;
						$uploader->save($path, $newImageName);
						$productData['options'][$optionsValue[0]]['values'][$optionsValue[1]]['image']=$uploader->getUploadedFileName();
					} catch(Exception $e) {
						Mage::log('Unable to save custom option image. ' . $e->getMessage(), null, null, true);
					}
 
				}
			}
		}
	}
}