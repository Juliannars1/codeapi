<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// API Routes
$route['api/popup']['GET'] = 'api/popup';
$route['api/popup']['POST'] = 'api/popup';