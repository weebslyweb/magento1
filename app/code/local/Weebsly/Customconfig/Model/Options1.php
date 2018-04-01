<?php
class Weebsly_Customconfig_Model_Options1
{
  /**
   * Provide available options as a value/label array
   *
   * @return array
   */
  public function toOptionArray()
  {
    return array(
      array('value'=>1, 'label'=>'ek'),
      array('value'=>2, 'label'=>'do'),
      array('value'=>3, 'label'=>'teen'),            
      array('value'=>4, 'label'=>'char')                     
    );
  }
  
}