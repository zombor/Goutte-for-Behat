<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$steps->When('/^I fill in "([^"]*)" with "(.*)"$/', function($world, $field, $value)
{
	$world->inputFields[$field] = $value;
});

$steps->When('/^I select "([^"]*)" from "([^"]*)"$/', function($world, $value, $field)
{
	$world->inputFields[$field] = $value;
});

$steps->When('/^I check "([^"]*)"$/', function($world, $field)
{
	$world->inputFields[$field] = true;
});

$steps->When('/^I uncheck "([^"]*)"$/', function($world, $field)
{
	$world->inputFields[$field] = false;
});

$steps->When('/^I attach the file at "([^"]*)" to "([^"]*)"$/', function($world, $path, $field)
{
	$world->inputFields[$field] = $path;
});

$steps->When('/^I press "([^"]*)"$/', function($world, $button)
{
	$form = $world->crawler->selectButton($button)->form($world->inputFields);
	$world->crawler = $world->client->submit($form);
	$world->inputFields = array();
});

$steps->Then('/^The form should have (\d+) errors$/', function($world, $errorsCount)
{
	assertEquals($errorsCount, $world->crawler->filter('#errors')->children()->count());
});