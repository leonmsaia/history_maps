<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'General';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Home'] = 'General';

$route['project/(:any)'] = 'MapView/project/$1';
$route['project/(:any)/edit'] = 'MapView/projectEdit/$1';

$route['user/login'] = 'User/login/';
$route['user/register'] = 'User/register/';
$route['user/forget'] = 'User/forget/';
