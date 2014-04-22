<?php

class ApiModel extends Model {
	
	private $api_url = "http://api2.contrib.com/request/";
	private $headers = array('Accept: application/json');
	
 function createApiCall($url, $method, $headers, $data = array(),$user=null,$pass=null)
{
        if (($method == 'PUT') || ($method=='DELETE'))
        {
            $headers[] = 'X-HTTP-Method-Override: '.$method;
        }

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
        if ($user){
         curl_setopt($handle, CURLOPT_USERPWD, $user.':'.$pass);
        } 

        switch($method)
        {
            case 'GET':
                break;
            case 'POST':
                curl_setopt($handle, CURLOPT_POST, true);
                curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'PUT':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'DELETE':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
        }
        $response = curl_exec($handle);
        return $response;
}
	
	 function getdomain(){
	 	$domain = $_SERVER["HTTP_HOST"]."".$_SERVER['REQUEST_URI'];//input sitename without www
    $domain = $_SERVER["HTTP_HOST"];
    $domain = str_replace("http://","",$domain);
    $domain = str_replace("www.","",$domain);
    return $domain;
	}

	function getkey(){
		return md5($this->getdomain());
	}
	
	function getdomaininfo(){
	    $info = array();
		$url = $this->api_url.'getdomaininfo?domain='.$this->getdomain().'&key='.$this->getkey();
	    $result = $this->createApiCall($url, 'GET', $this->headers, array());
	    $data_domain = json_decode($result,true);
        
	    if ($data_domain['success']){	
		  	$info['domainid'] = $data_domain['data']['DomainId'];
	    	$info['domain'] = $data_domain['data']['DomainName'];
	    	$info['memberid'] = $data_domain['data']['MemberId'];
	    	$info['title'] = $data_domain['data']['Title'];
	    	$info['logo'] = $data_domain['data']['Logo'];
	    	$info['description'] = $data_domain['data']['Description'];
	    	$info['account_ga'] = $data_domain['data']['AccountGA'];
	    	$info['description'] = stripslashes(str_replace('\n','<br>',$info['description']));
		}
		return $info;
   }
   
   function getcontribprofile($field,$value){
   	    $url = $this->api_url.'getContribProfile?key='.$this->getkey().'&field='.$field."&value=".$value;
	    $result = $this->createApiCall($url, 'GET', $this->headers, array());
	    $data_domain = json_decode($result,true);
	    $profile = array();
        if ($data_domain['success']){
        	$profile['firstname'] =$data_domain['data']['firstname'];
        	$profile['lastname'] =$data_domain['data']['lastname'];
        	if ($data_domain['data']['picture']== ""){
        		$profile['picture'] ="http://d2qcctj8epnr7y.cloudfront.net/sheina/contrib/default_avatar.png";
        	}else {
        	    $profile['picture'] ="http://www.contrib.com/uploads/profile/".$data_domain['data']['picture'];
        	}
        }else {
        	$profile['firstname'] = "";
        	$profile['lastname'] ="";
        	$profile['picture'] ="";
        }
        
        return $profile;
   }
   
   private function getteammembers($domain){
   	  $url = $this->api_url.'GetTeamPerDomain?domain_name='.$domain;
   	  $result = $this->createApiCall($url, 'GET', $this->headers, array());
      $data = json_decode($result,true);
      $profile = array();
       if (count($data['data']) > 0){
           $m =0;
           foreach($data['data'] as $mkey=>$mval){
                
                	 $profile[$m]['firstname'] = $mval['firstname'];
                	 $profile[$m]['lastname'] = $mval['lastname'];
                 	 if ($mval['picture'] == ""){
                 	 	 $cdata = $this->getcontribprofile('EmailAddress',$mval['email']);
                 	 	 $profile[$m]['picture'] = $cdata['picture'];
                 	 }else {
                	   $profile[$m]['picture'] = "http://manage.vnoc.com/uploads/picture/".$mval['picture'];
                 	 }
                 	 $m++;
                }
                
           }         
       
       return $profile;                                  
   }
   
   function getsites($search = null){
   	
   	  $url = $this->api_url.'getdomainattributes?domain='.$this->getdomain().'&key='.$this->getkey();
      $result = $this->createApiCall($url, 'GET', $this->headers, array());
      $data_domain = json_decode($result,true);
      
     $sites = array(
   	     0 => array('domain'=>'jobguide.com','image'=>'http://d2qcctj8epnr7y.cloudfront.net/images/lucille/jobguide.png'),
   	     1 => array('domain'=>'virtualinterns.com','image'=>'http://d2qcctj8epnr7y.cloudfront.net/images/lucille/virtualinterns.png'),
   	     2 => array('domain'=>'staffing.com','image'=>'http://d2qcctj8epnr7y.cloudfront.net/images/lucille/staffing.png'),
   	     3 => array('domain'=>'gatorjobs.com','image'=>'http://d2qcctj8epnr7y.cloudfront.net/images/lucille/gatorjobs.png'),
   	     4 => array('domain'=>'eservices.com','image'=>'http://d2qcctj8epnr7y.cloudfront.net/images/lucille/eservices.png')
   	     );
      
      if ($data_domain['success']){
      	  $data = $data_domain['data'];
      	  
      	  if (count($data)>0){
      	  	
              for ($l=0;$l<6;$l++){
              	$num = $l+1;
              	 if ($data["job_site_$num"]!="" && $data["job_site_$num"]!=""){
	              	 $sites[$l]['domain'] = str_replace('http://','',$data["job_site_$num"]);
	              	 $sites[$l]['domain'] = str_replace('www.','',$data["job_site_$num"]);
	              	 $sites[$l]['image'] = $data["job_site_image_$num"];
              	 }
              }	  	
      	  }
      }
      
    	
   	    
   	    
   	     for ($i=0;$i<count($sites);$i++){
   	     	    $url = $this->api_url.'getjobsites?domain='.$sites[$i]['domain'].'&key='.$this->getkey();
			    $result = $this->createApiCall($url, 'GET', $this->headers, array());
			    $data_domain = json_decode($result,true);
			    if ($data_domain['success']){
			    	foreach ( $data_domain['data'] as $key=>$val){
				    	$sites[$i]['ids']= $val['ids'];
				     	$sites[$i]['jobs']= $val['titles'];
				     	$sites[$i]['logo']= $val['logo'];
				     	$sites[$i]['description']= $val['description'];
				     	$sites[$i]['members']= $this->getteammembers($sites[$i]['domain']);
			    	}
			    }else {
			    	$sites[$i]['ids']= "";
			     	$sites[$i]['jobs']= "";
			     	$sites[$i]['logo']= "";
			     	$sites[$i]['description']= "";
			     	$sites[$i]['members'] = $this->getteammembers($sites[$i]['domain']);
			    }
			    
   	     }
   	     
   	     return $sites;
   }
   
   
   
   
}
?>
