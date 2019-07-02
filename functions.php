<?php
/**
 * Here we will intialize our wp theme.
 * @package Timpress
 */

// Initialize the autoloader to load all classes inside of our theme.
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php'))
	require_once dirname(__FILE__) . '/vendor/autoload.php';

// Check if the class that intialize our theme is existing. 
// Initialize and register wordpress methods, filters, etc..
if(class_exists('Timpress\\init'))
	new Timpress\init();