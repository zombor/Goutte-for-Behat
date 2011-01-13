<?php

// Init kohana
defined('APPPATH') ?: define('APPPATH', 'application/');
defined('MODPATH') ?: define('MODPATH', 'modules/');
defined('SYSPATH') ?: define('SYSPATH', 'system/');
defined('EXT')     ?: define('EXT', '.php');
require_once APPPATH.'bootstrap.php';


// Load PHPUnit functions
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

// Load Goutte
require_once __DIR__.'/../../Goutte/src/autoload.php';

// Create WebClient behavior 
$world->client = new \Goutte\Client;

$world->inputFields = array();

$world->request = function($type, $link) use ($world)
{
	$world->crawler = $world->client->request($type, URL::site($link));
	
	// Don't automatically follow redirects
	$world->client->followRedirects(FALSE);
};