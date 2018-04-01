<?php
class Weebsly_Emp_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * Index action
     */
    public function indexAction()
    {
        echo "Employee indexcontroller.....";
        var_dump(Mage::getModel('emp/employee')->getData());
    }
}    
    