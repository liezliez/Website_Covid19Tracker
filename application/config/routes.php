<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'DashboardController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['hotline-corona'] = 'HotlineController';
$route['hubungi-kami'] = 'ContactController';
$route['admin'] = 'AdminController';
$route['admin/login'] = 'AdminController/login';
$route['admin/logout'] = 'AdminController/logout';
$route['admin/data-indonesia'] = 'AdminController';
$route['admin/data-global'] = 'AdminController/global';
$route['admin/hotlines'] = 'AdminController/hotlines';
$route['admin/pesan'] = 'AdminController/message';