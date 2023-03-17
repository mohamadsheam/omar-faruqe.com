<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Web';
$route['home'] = 'Web';
$route['admin'] = 'Dashboard';
$route['dashboard'] = 'Dashboard';
$route['login'] = 'Common/login';
$route['logout'] = 'Common/logout';

// setting
//$route['profile'] = 'Users/profile';

$route['404_override'] = 'myerror';
$route['translate_uri_dashes'] = FALSE;
