<?php

$aliases['dev'] = array(
	'uri' => 'dev.winsarnia.com',
	'root' => '/home/win/subdomains/dev/public_html',
	'remote-host' => 'winsarnia.com',
	'remote-user' => 'win',

	'path-aliases' => array(
		'%dump-dir' => '/home/win/subdomains/dev/_dumps',
		'%files'	=> 'sites/default/files',
	),

	//'ssh-options' => "-p 37241",
);
