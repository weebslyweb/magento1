<?php
class Weebsly_Emp_Model_Resource_Employee_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct() {
       $this->_init('emp/employee');
    }
}