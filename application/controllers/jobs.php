<?php

class Jobs extends Controller {
	
  
    
	public function site()
	{
		
		$helper = $this->loadHelper('Url_helper');
		if(defined('ENV'))
		   $site =  $helper->segment(4);
		else 
		   $site =  $helper->segment(3);
		
		$api = $this->loadModel('ApiModel');
		$info = $api->getdomaininfo();
		$job = $api->getjobdetails(null,$site);
		
		$others_jobs = $api->getotherjobs($site);
		$socials = $api->getsocials($site);
		$members = $api->getteammembers($site);
		
		$template = $this->loadView('jobs/site-details');
		$template->set('page', 'jobs');
		$template->set('info', $info);
		$template->set('job', $job);
		$template->set('site', $site);
		
		$template->set('other_jobs', $others_jobs);
		$template->set('social', $socials);
		$template->set('members', $members);
		$template->render();
	}
	
	public function joblist(){
		$helper = $this->loadHelper('Url_helper');
		if(defined('ENV'))
		   $site =  $helper->segment(4);
		else 
		   $site =  $helper->segment(3);
		   
		 $api = $this->loadModel('ApiModel');
		 $info = $api->getdomaininfo();
		 $others_jobs = $api->getotherjobs($site);
		 
		 $template = $this->loadView('jobs/joblist');  
		 $template->set('info', $info);
		 $template->set('page', 'jobs');
		 $template->set('site', $site);
		 $template->set('other_jobs', $others_jobs);
		 $template->render();
	}
    
	public function details(){
		$helper = $this->loadHelper('Url_helper');
		if(defined('ENV'))
		   $job_id =  $helper->segment(5);
		else 
		   $job_id =  $helper->segment(4);
		
		$api = $this->loadModel('ApiModel');
		$info = $api->getdomaininfo();
		$job = $api->getjobdetails($job_id);
		$site = $job['domain'];
		$others_jobs = $api->getotherjobs($site);
		$socials = $api->getsocials($site);
		$members = $api->getteammembers($site);
		
		$template = $this->loadView('jobs/site-details');
		$template->set('page', 'jobs');
		$template->set('info', $info);
		$template->set('job', $job);
		$template->set('site', $site);
		$template->set('other_jobs', $others_jobs);
		$template->set('social', $socials);
		$template->set('members', $members);
		$template->render();  
	}
	
	 public function search(){
		$helper = $this->loadHelper('Url_helper');
		$input = $this->loadHelper('Input_helper');
		$search = $input->post('search');
        $api = $this->loadModel('ApiModel');
		$info = $api->getdomaininfo();
		$sites = $api->getsites();
	    $no_of_site = count($sites);
	    $in = "";
	    $i=0;
        if (count($no_of_site)>0){
        	foreach ($sites as $key=>$val){
        		 $in .=  "'".$val['domain']."'";
        	     if ($i<($no_of_site-1)){
	           	  $in .= ",";
	           }
	           $i++;
        	}
        }
       
		
		
		 $others_jobs = $api->searchjobs($in,$search);
		 $template = $this->loadView('jobs/joblist');  
		 $template->set('info', $info);
		 $template->set('page', 'jobs');
		 $template->set('site', $api->getdomain());
		 $template->set('other_jobs', $others_jobs);
		 $template->render();
	}
	
}

?>
