<?php
class Weebsly_Dbscript_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * Index action
     */
    public function indexAction()
    {
        echo "formdata indexcontroller.....";
        var_dump(Mage::getModel('dbscript/formdata')->getCollection()->getData());
    }
    public function adddataAction()
    {
        echo "adddataAction formdata indexcontroller.....</br>";
        $form = Mage::getModel('dbscript/formdata');
        $form->setTitle('title 2 !');
        $form->setDescription('Discription 22 !');
        $form->save();
        echo 'Post with ID ' . $form->getId() . ' created.';

    }
    public function showdataAction()
    {
        echo "SHOW dataAction formdata indexcontroller.....</br>";
        $form = Mage::getModel('dbscript/formdata');
        
       var_dump($form);
    }


}