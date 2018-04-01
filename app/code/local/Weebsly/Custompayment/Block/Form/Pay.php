<?php
class Weebsly_Custompayment_Block_Form_Pay extends Mage_Payment_Block_Form
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('pay/form/pay.phtml');
    }
}