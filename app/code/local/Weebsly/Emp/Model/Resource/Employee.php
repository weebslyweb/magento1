<?php
class Weebsly_Emp_Model_Resource_Employee extends Mage_Core_Model_Resource_Db_Abstract
{
	protected function _construct()
    {
        $this->_init('emp/employee','empid');
    }
}