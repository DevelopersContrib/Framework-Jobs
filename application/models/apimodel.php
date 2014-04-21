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
   
   function getsites($search = null){
   	     $sites = array(
   	     0 => array('domain'=>'jobguide.com','image'=>'http://d2qcctj8epnr7y.cloudfront.net/images/lucille/jobguide.png'),
   	     1 => array('domain'=>'virtualinterns.com','image'=>'http://d2qcctj8epnr7y.cloudfront.net/images/lucille/virtualinterns.png'),
   	     2 => array('domain'=>'staffing.com','image'=>'http://d2qcctj8epnr7y.cloudfront.net/images/lucille/staffing.png'),
   	     3 => array('domain'=>'gatorjobs.com','image'=>'http://d2qcctj8epnr7y.cloudfront.net/images/lucille/gatorjobs.png'),
   	     4 => array('domain'=>'eservices.com','image'=>'http://d2qcctj8epnr7y.cloudfront.net/images/lucille/eservices.png')
   	     );
   	    
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
			    	}
			    }else {
			    	$sites[$i]['ids']= "";
			     	$sites[$i]['jobs']= "";
			     	$sites[$i]['logo']= "";
			     	$sites[$i]['description']= "";
			    }
			    
   	     }
   	     return $sites;
   }
   
   
   
   
}
?>
