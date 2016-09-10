<?php
class Webarzoo_DC_Adminhtml_DcController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Return some checking result
     *
     * @return void
     */
    public function checkAction()
    {
	    $helper=Mage::helper('dc');
		$storezip=$helper->getStoreZip();
		$range=$helper->getStoreDeliveryRange();
        $token_auth = 'anonymous';
		$arrContextOptions=array(
			"ssl"=>array(
				"verify_peer"=>false,
				"verify_peer_name"=>false,
			),
		);  
						 $data = 'Data not found';
				 if(!empty($storezip) && !empty($range)){
				  $url = "https://www.zipcodeapi.com/rest/jx0ug0sWv5snfOAdEp2xviUvnCo3J7d2EexVeZSJ4l7kaIxO7zmDSh9fTxjCExFj/radius.json";
				  $url .= "/".$storezip;
				  $url .= "/".$range;
				  $url .= "/mile";
				  $url .= "&token_auth=$token_auth";
				   $fetched = file_get_contents($url, false, stream_context_create($arrContextOptions));
                   $response = json_decode($fetched);
				  foreach($response->zip_codes as $zips){
			              $zipall[]=$zips->zip_code;
			         }
					 if(is_array($zipall)){
					 $data=implode(",",$zipall);
					  }
			      }
				
		
		
        Mage::app()->getResponse()->setBody(json_encode($data));
    }
}