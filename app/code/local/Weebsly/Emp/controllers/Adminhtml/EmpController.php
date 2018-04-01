<?php
 
class Weebsly_Emp_Adminhtml_EmpController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {

        $this->_title($this->__('Employee'))->_title($this->__('Employee Data'));
        $this->loadLayout();
    $this->_setActiveMenu('emp/employee');
    
    $this->renderLayout();
    }
 
    public function newAction()
    {
        $this->_forward('edit');
    }
 
    public function editAction()
    {
        $id = $this->getRequest()->getParam('id', null);
        $model = Mage::getModel('emp/employee');
        if ($id) {
            $model->load((int) $id);
 
            if ($model->getId()) {
                $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
                if ($data) {
                    $model->setData($data)->setId($id);
                }
            } else {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('emp')->__('Employee Data does not exist'));
                $this->_redirect('*/*/');
            }
        }
        Mage::register('employee_data', $model);
 
    $this->_title($this->__('Employee'))->_title($this->__('Edit Employee Data'));
        $this->loadLayout();
        $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
        $this->renderLayout();
    }
 
    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost())
        {
            $model = Mage::getModel('emp/employee');
            $id = $this->getRequest()->getParam('id');
 
            foreach ($data as $key => $value)
            {
                if (is_array($value))
                {
                        $data[$key] = implode(',',$this->getRequest()->getParam($key));
                }
            }
 
            if ($id) {
                $model->load($id);
            }
            $model->setData($data);
 
            Mage::getSingleton('adminhtml/session')->setFormData($data);
            try {
                if ($id) {
                    $model->setId($id);
                }
                $model->save();
 
                if (!$model->getId()) {
                    Mage::throwException(Mage::helper('emp')->__('Error saving employee'));
                }
 
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('emp')->__('Employee Data was successfully saved.'));
 
                Mage::getSingleton('adminhtml/session')->setFormData(false);
 
                // The following line decides if it is a "save" or "save and continue"
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/');
                }
 
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                if ($model && $model->getId()) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/');
                }
            }
 
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('emp')->__('No data found to save'));
        $this->_redirect('*/*/');
    }
 
    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                $model = Mage::getModel('emp/employee');
                $model->setId($id);
                $model->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('emp')->__('The Employee has been deleted.'));
                $this->_redirect('*/*/');
                return;
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Unable to find the employee to delete.'));
        $this->_redirect('*/*/');
    }
}