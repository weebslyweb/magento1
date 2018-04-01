<?php
class Weebsly_Customconfig_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        echo "what the fuck.....";
        $abcd = Mage::getStoreConfig('customconfig_options/section_two/custom_field_three');
        var_dump($abcd);
    }

}