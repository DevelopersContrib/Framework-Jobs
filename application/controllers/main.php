<?php

class Main extends Controller {
	
	
	
	function index()
	{
		$api = $this->loadModel('ApiModel');
		$helper = $this->loadHelper('Url_helper');
		$info = $api->getdomaininfo();
		$sites = $api->getsites();
		$template = $this->loadView('jobs/index');
		$template->set('page', 'team');
		$template->set('info', $info);
		$template->set('sites', $sites);
		$template->render();
	}
}

?>
