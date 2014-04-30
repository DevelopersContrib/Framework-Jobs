<?php 
if(defined('ENV'))
    $config['base_url'] = 'http://localhost/jobs/';
else
    $config['base_url']	= '/';

 // Base URL including trailing slash (e.g. http://localhost/)

$config['default_controller'] = 'main'; // Default controller to load
$config['error_controller'] = 'error'; // Controller used for errors (e.g. 404, 500 etc)

if(defined('ENV')){
	$config['db_host'] = ''; // Database host (e.g. localhost)
	$config['db_name'] = ''; // Database name
	$config['db_username'] = ''; // Database username
	$config['db_password'] = ''; // Database password
}else {
	$config['db_host'] = '162.242.169.48'; // Database host (e.g. localhost)
	$config['db_name'] = 'contrib_rdb'; // Database name
	$config['db_username'] = 'contread'; // Database username
	$config['db_password'] = 't1ng1nd4w'; // Database password
}
?>