<?php

class Main extends Controller {
	
	function index()
	{
		$api = $this->loadModel('ApiModel');
		$info = $api->getdomaininfo();
		$sites = $api->getsites();
		$template = $this->loadView('index/index');
		$template->set('page', 'team');
		$template->set('info', $info);
		$template->set('sites', $sites);
		$template->render();
	}
    
}

?>
