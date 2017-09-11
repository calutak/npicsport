<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'fe_home';
//admin section
$route['sysladm'] = 'c_auth/index';
$route['adm'] = 'c_dashboard/index';
$route['adm/syslogout'] = 'c_dashboard/logout';
//tournament
$route['adm/tournament/create'] = 'c_tournament/create_tour';
$route['adm/tournament/create/newpost'] = 'c_tournament/insert_new_tour';
$route['adm/tournament/manage'] = 'c_tournament/manage';
$route['adm/tournament/edit/(:any)'] = 'c_tournament/edit_data_tour/$1';
$route['adm/tournament/delete/(:any)'] = 'c_tournament/delete/$1';
$route['adm/tournament/update/confirm'] = 'c_tournament/update';
$route['adm/tournament/show_details/(:any)'] = 'c_tournament/show_details/$1';
$route['adm/tournament/history'] = 'c_tournament/show_history';
$route['adm/tournament/history/findyear'] = 'c_tournament/find_tournament_year';
//schedule
$route['adm/schedule/create'] = 'c_schedule/form_create';
$route['adm/schedule/create/add_new'] = 'c_schedule/create_match';
$route['adm/schedule/manage'] = 'c_schedule/form_manage';
$route['adm/schedule/clear'] = 'c_schedule/clear_schedule';
$route['adm/schedule/renderBracket/(:any)'] = 'c_schedule/fill_bracket_team/$1';
//timeline
$route['adm/timeline/create'] = 'c_timeline/create_post';
$route['adm/timeline/create/post'] = 'c_timeline/posting_timeline';
$route['adm/timeline/manage'] = 'c_timeline/view_post';
$route['adm/timeline/manage/edit/(:any)'] = 'c_timeline/edit_post/$1';
$route['adm/timeline/manage/save'] = 'c_timeline/update_post';
$route['adm/timeline/manage/delete/(:any)'] = 'c_timeline/delete_post/$1';
//message
$route['adm/message/broadcast'] = 'c_message/form_broadcast';
//validate
$route['adm/validate/team'] = 'c_validate/manage_team';

// FRONT END //
$route['team'] = 'fe_team';

//default
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Plugin routing
$route['mediaUpload'] = 'c_timeline/mediaUpload';
$route['js/tiny_mce/plugins/images/connector/php/index[.]php'] = "c_timeline/mediaUpload";
$route['js/tiny_mce/plugins/images/connector/php'] = "c_timeline/mediaUpload";
