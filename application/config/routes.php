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
//backgroundtask
$route['check_date'] = 'c_dashboard/check_regist_date';
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
$route['adm/tournament/multi_delete'] = 'c_tournament/clear_tournament_data';
$route['adm/tournament/update/confirm'] = 'c_tournament/update';
$route['adm/tournament/get_details/(:any)'] = 'c_tournament/get_details/$1';
//schedule
$route['adm/schedule/create/(:any)'] = 'c_schedule/form_create/$1';
$route['adm/schedule/create/(:any)/add_new'] = 'c_schedule/append_schedule/$1';
$route['adm/schedule/find_s'] = 'c_schedule/find_schedule';
$route['adm/schedule/find_t'] = 'c_schedule/find_tournament';
$route['adm/schedule/manage/(:any)'] = 'c_schedule/form_manage/$1';
$route['adm/schedule/edit'] = 'c_schedule/edit_schedule';
$route['adm/schedule/edit/(:any)/(:any)/(:any)'] = 'c_schedule/update_schedule/$1/$2/$3';
$route['adm/schedule/clear/(:any)'] = 'c_schedule/clear_schedule/$1';
$route['adm/schedule/check_date'] = 'c_schedule/date_time_check';	
//drawing
$route['adm/drawing'] = 'c_drawing/drawing_page';
$route['adm/drawing/find'] = 'c_drawing/find_data';
$route['adm/drawing/match/(:any)'] = 'c_drawing/create_match/$1';
$route['adm/drawing/bracket'] = 'c_drawing/bracket';
$route['adm/drawing/bracket/draw'] = 'c_drawing/retrieve_bracket';
//match
$route['adm/match'] = 'c_match';
$route['adm/match/find'] = 'c_match/find_match';
$route['adm/match/update'] = 'c_match/update_match';
$route['adm/match/updateAll'] = 'c_match/update_match_all';
//timeline
$route['adm/timeline/create'] = 'c_timeline/create_post';
$route['adm/timeline/create/post'] = 'c_timeline/posting_timeline';
$route['adm/timeline/manage'] = 'c_timeline/view_post';
$route['adm/timeline/manage/edit/(:any)'] = 'c_timeline/edit_post/$1';
$route['adm/timeline/manage/save'] = 'c_timeline/update_post';
$route['adm/timeline/manage/delete/(:any)'] = 'c_timeline/delete_post/$1';
$route['adm/timeline/clear_timeline/(:any)'] = 'c_timeline/clear_timeline/$1';
$route['adm/gallery'] = 'c_timeline/form_input_gallery';
$route['adm/gallery/manage'] = 'c_timeline/view_gallery';
$route['adm/gallery/manage/edit/(:any)'] = 'c_timeline/edit_gallery/$1';
$route['adm/gallery/manage/edit/(:any)/save'] = 'c_timeline/update_gallery/$1';
$route['adm/gallery/manage/delete/(:any)'] = 'c_timeline/delete_gallery/$1';
$route['adm/gallery/post'] = 'c_timeline/post_gallery';
$route['adm/gallery/clear_timeline/(:any)'] = 'c_timeline/clear_timeline/$1';
//message
$route['adm/message/broadcast'] = 'c_message/form_broadcast';
$route['adm/message/send/mail'] = 'c_message/send_mail';
$route['adm/message/manage'] = 'c_message/manage_message';
$route['adm/message/manage/reply/(:any)'] = 'c_message/reply/$1';
$route['adm/message/manage/delete/(:any)'] = 'c_message/delete/$1';
$route['adm/message/reply/(:any)/post'] = 'c_message/post_reply/$1';
$route['adm/message/delete_all'] = 'c_message/clear_inbox';
//team
$route['adm/manage/team'] = 'c_validate/manage_team';
$route['adm/team/multi_delete'] = 'c_validate/delete_all_team';
$route['adm/manage/team/(:any)'] = 'c_validate/manage_team_member/$1';
$route['adm/manage/team/edit/(:any)'] = 'c_validate/form_edit_team/$1';
$route['adm/team/new'] = 'c_validate/form_team_register';
$route['adm/team/add/(:any)/member'] = 'c_validate/form_add_member/$1';
$route['adm/team/deleteall/(:any)/member'] = 'c_validate/delete_all_member/$1';
$route['adm/team/add/(:any)/member/post'] = 'c_validate/do_add_member/$1';
$route['adm/team/member/(:any)/delete/(:any)'] = 'c_validate/do_delete_member/$1/$2';
$route['adm/team/member/(:any)/edit/(:any)'] = 'c_validate/form_edit_member/$1/$2';
$route['adm/team/member/(:any)/edit/(:any)/confirm'] = 'c_validate/do_update_member/$1/$2';
$route['adm/team/new/add'] = 'c_validate/do_register';
$route['adm/team/account/delete/(:any)'] = 'c_validate/delete_team/$1';
$route['adm/team/details/(:any)'] = 'c_validate/get_team_details/$1';
$route['adm/team/validate/(:any)/(:any)/(:num)'] = 'c_validate/validate_team/$1/$2/$3';

// FRONT END //
$route['match'] = 'fe_match';
$route['match-detail']='fe_match-detail';
$route['home']='fe_home';
$route['about']='fe_about';
$route['matchd']='fe_matchdetail';
$route['matchr']='fe_matchresult';
$route['matchr/retrieve_list_date/(:any)'] = 'fe_matchresult/retrieve_list_date/$1';
$route['matchr/load_match'] = 'fe_matchresult/retrieve_matches';
$route['team']='fe_team';
$route['team/(:any)/details'] = 'fe_team/load_member/$1';
$route['tournament']='fe_tournament';
$route['tournament/load_bracket'] = 'fe_tournament/fill_bracket_team';
$route['contact']='fe_contact';
$route['contact/send_feedback']='fe_contact/send_feedback';
$route['gallery']='fe_gallery';
$route['news/(:any)'] = 'fe_home/find_news/$1';

//default
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Plugin routing
$route['mediaUpload'] = 'c_timeline/mediaUpload';
$route['js/tiny_mce/plugins/images/connector/php/index[.]php'] = "c_timeline/mediaUpload";
$route['js/tiny_mce/plugins/images/connector/php'] = "c_timeline/mediaUpload";

