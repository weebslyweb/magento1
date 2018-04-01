<?php
 
class Weebsly_Emp_Block_Adminhtml_Emp_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        if (Mage::registry('employee_data'))
        {
            $data = Mage::registry('employee_data')->getData();
        }
        else
        {
            $data = array();
        }
 
        $form = new Varien_Data_Form(array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                'method' => 'post',
                'enctype' => 'multipart/form-data',
        ));
 
        $form->setUseContainer(true);
 
        $this->setForm($form);
 
        $fieldset = $form->addFieldset('employee_form', array(
             'legend' =>Mage::helper('emp')->__('Employee Information')
        ));
 
        $fieldset->addField('name', 'text', array(
             'label'     => Mage::helper('emp')->__('Employee Name'),
             'class'     => 'required-entry',
             'required'  => true,
             'name'      => 'name'
        ));
 
        $fieldset->addField('address', 'text', array(
             'label'     => Mage::helper('emp')->__('address'),
             'class'     => 'required-entry',
             'required'  => true,
             'name'      => 'address'
        ));
 
        $form->setValues($data);
 
        return parent::_prepareForm();
    }
}