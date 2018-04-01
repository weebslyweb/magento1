<?php
class Weebsly_Emp_Model_Employee extends Mage_Core_Model_Abstract
{
	protected function _construct()
    {
        $this->_init('emp/employee');
    }
}