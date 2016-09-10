<?php
class Webarzoo_DC_Helper_Data extends Mage_Core_Helper_Abstract
{



   public function getEnable(){
       
	return	Mage::getStoreConfig('dc/dc/dc_enable',Mage::app()->getStore());
    }
   public function getdcTitle(){
       
	return	Mage::getStoreConfig('dc/dc/dc_title',Mage::app()->getStore());
    }
    public function getStoreZip(){
       
		return Mage::getStoreConfig('dc/dc/dc_zipcode',Mage::app()->getStore());
    }
 
    public function getStoreDeliveryRange(){
    return Mage::getStoreConfig('dc/dc/dc_range',Mage::app()->getStore());
    }
	
	
	public function getAllowedZip(){
    return Mage::getStoreConfig('dc/dc/dc_allowed',Mage::app()->getStore());
    }
	
	public function getSucessMsg(){
   return  Mage::getStoreConfig('dc/dc/dc_success',Mage::app()->getStore());
    }
	public function getErrorMsg(){
    return Mage::getStoreConfig('dc/dc/dc_error',Mage::app()->getStore());
    }
}
	 