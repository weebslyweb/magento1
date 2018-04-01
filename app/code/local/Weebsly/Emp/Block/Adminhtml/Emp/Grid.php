<?php
 
class Weebsly_Emp_Block_Adminhtml_Emp_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('employee_grid');
        $this->setDefaultSort('empid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }
 
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('emp/employee')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
 
    protected function _prepareColumns()
    {
        $this->addColumn('empid', array(
            'header'    => Mage::helper('emp')->__('ID'),
            'align'     =>'right',
            'width'     => '50px',
            'index'     => 'Empid',
        ));
 
        $this->addColumn('name', array(
            'header'    => Mage::helper('emp')->__('name'),
            'align'     =>'left',
            'index'     => 'name',
        ));
 
        $this->addColumn('address', array(
            'header'    => Mage::helper('emp')->__('address'),
            'align'     =>'left',
            'index'     => 'address',
        ));
 
        return parent::_prepareColumns();
    }
 
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}