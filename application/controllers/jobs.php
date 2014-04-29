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
		$sites = $api->getsites();
		$others_jobs = $api->getotherjobs($site);
		$socials = $api->getsocials($site);
		$members = $api->getteammembers($site);
		
		$template = $this->loadView('jobs/site-details');
		$template->set('page', 'jobs');
		$template->set('info', $info);
		$template->set('job', $job);
		$template->set('site', $site);
		$template->set('sites', $sites);
		$template->set('other_jobs', $others_jobs);
		$template->set('social', $socials);
		$template->set('members', $members);
		$template->render();
	}
    
}

?>
