<?php
class Webarzoo_DC_IndexController extends Mage_Core_Controller_Front_Action
{
		public function indexAction() {
		/*get checkdelivery store config data */
		$zip = $this->getRequest()->getParam('zipcode');
		$sku = $this->getRequest()->getParam('sku');
		$helper=Mage::helper('dc');
		
			 $output=0;
		     $notvalidinput=0;
               
		     if(isset($zip) && !empty($zip)){
					if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $zip)){
					$response['message'] = "Special character is not allowed";
					$response['color'] = 'red';
					$notvalidinput++;
				}
				}else{
				    $response['message'] = "Please Enter zipcode";
					$response['color'] = 'red';
					$notvalidinput++;
				
				}
			       if($notvalidinput==0){
				   
				    if(!empty($helper->getAllowedZip())){
				    $datazipall =explode(",",$helper->getAllowedZip());
					if(is_array($datazipall)){
				      if (in_array($zip, $datazipall)) {
				             $output++;
				      }
					  }else{
					  if($helper->getAllowedZip()==$zip){
					  
					  $output++;
					  
					  }
					 }
					}
	
				   
				   if($output==0){
				    $response['message'] = $helper->getErrorMsg();
					$response['color'] = 'red';
				   }else{
				    $response['message'] = $helper->getSucessMsg();
					$response['color'] = 'green';
				   }
			  }
				
				echo json_encode($response);
			
		
			
		}
    }
			
	
