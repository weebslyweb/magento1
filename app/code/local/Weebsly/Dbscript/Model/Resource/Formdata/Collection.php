<?php
class Weebsly_Dbscript_Model_Resource_Formdata_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {
    protected function _construct()
    {
            $this->_init('dbscript/formdata');
    }
}