<?php
class Weebsly_Dbscript_Model_Resource_Formdata extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('dbscript/formdata', 'formid');
    }
}