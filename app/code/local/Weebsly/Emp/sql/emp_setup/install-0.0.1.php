<?php
 
$installer = $this;
$installer->startSetup();
 
$table = $installer->getConnection()
    ->newTable($installer->getTable('emp/employee'))
    ->addColumn('empid', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Empid')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
        ), 'Name')
    ->addColumn('address', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
        ), 'Address')
    ->addColumn('phone', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
        ), 'Phone')
    ->addColumn('salary', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
        ), 'Salary');
$installer->getConnection()->createTable($table);
$installer->endSetup();