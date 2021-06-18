<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'MapView';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['project/(:any)'] = 'MapView/project/$1';

$route['project/(:any)/edit'] = 'MapView/projectEdit/$1';