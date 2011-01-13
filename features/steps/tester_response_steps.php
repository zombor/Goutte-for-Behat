<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$steps->Then('/^Response status code is (\d+)$/', function($world, $code)
{
	assertEquals($code, $world->client->getResponse()->getStatus());
});

$steps->Then('/^I should see "([^"]*)"$/', function($world, $text)
{
	assertRegExp('/'.preg_quote($text).'/', $world->client->getResponse()->getContent());
});

$steps->Then('/^I should not see "([^"]*)"$/', function($world, $text)
{
	assertNotRegExp('/'.preg_quote($text).'/', $world->client->getResponse()->getContent());
});

$steps->Then('/^I should see element "([^"]*)"$/', function($world, $css)
{
	$world->crawler->filter($css)->count();
});

$steps->Then('/^the title should be "([^"]*)"$/', function($world, $expected)
{
	preg_match('%<title>(.*)</title>%', $world->client->getResponse()->getContent(), $matches);
	
	assertEquals($expected, $matches[1]);
});

//$steps->Then('/^Header "([^"]*)" is set to "([^"]*)"$/', function($world, $key, $value)
//{
//	$world->browser->with('response')->isHeader($key, $value);
//});
//
//$steps->Then('/^Header "([^"]*)" is not set to "([^"]*)"$/', function($world, $key, $value)
//{
//	$world->browser->with('response')->isHeader($key, '!' . $value);
//});
//
//$steps->Then('/^Cookie "([^"]*)" was set$/', function($world, $name)
//{
//	$world->browser->with('response')->setsCookie($name);
//});
//
//$steps->Then('/^Cookie "([^"]*)" was set to "([^"]*)"$/', function($world, $name, $value)
//{
//	$world->browser->with('response')->setsCookie($name, $value);
//});
//
//$steps->Then('/^Cookie "([^"]*)" was not set to "([^"]*)"$/', function($world, $name, $value)
//{
//	$cookies = $world->response->getCookies();
//	$world->browser->test()->isnt($cookies[$name], $value);
//});
//
//$steps->Then('/^I was redirected$/', function($world)
//{
//	$world->browser->with('response')->isRedirected(true);
//});
//
//$steps->Then('/^I was not redirected$/', function($world)
//{
//	$world->browser->with('response')->isRedirected(false);
//});