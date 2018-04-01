<?php
class Weebsly_Emp_Block_Adminhtml_Emp extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	
   	public function __construct()
    {
    	
        $this->_blockGroup = 'emp';
        $this->_controller = 'adminhtml_emp';
        $this->_headerText = Mage::helper('emp')->__('Employee');
        parent::__construct();
    }
}