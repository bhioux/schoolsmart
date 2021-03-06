<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index'); //

$routes->get('/register', 'Home::register');
$routes->get('/passreset', 'Home::passreset');
$routes->get('/studentprofile', 'Home::studentprofile');
$routes->get('/updateprofile', 'Home::updateprofile');
$routes->get('/editprofile', 'Home::editprofile');
$routes->get('/students', 'Home::students');
//$routes->get('/addvehicles', 'Home::addvehicles');

$routes->get('/reportcardnur', 'Home::reportcardnur');
$routes->get('/reportcardpry', 'Home::reportcardpry');
$routes->get('/reportcardjss', 'Staff::reportcardjss');
$routes->get('/reportcardsss', 'Staff::reportcardsss');
$routes->get('/applicationform', 'Home::applicationform');
$routes->get('/staffprofile', 'Home::staffprofile');
$routes->get('/updatestaffprofile', 'Home::updatestaffprofile');
$routes->get('/staffsetup', 'Home::staffsetup');
$routes->get('/assessmentsetup', 'Staff::assessmentsetup');
$routes->get('/billsetup', 'Staff::billsetup');
$routes->get('/awardsetup', 'Staff::awardsetup');
$routes->get('/traitssetup', 'Staff::traitssetup');
$routes->get('/affectiveareasetup', 'Staff::affectiveareasetup');
$routes->get('/socialhabitsetup', 'Staff::socialhabitsetup');
$routes->get('/commentssetup', 'Staff::commentssetup');

$routes->get('/login', 'Home::login'); //
$routes->get('/logout', 'Home::logout'); //
$routes->post('/dologin', 'Home::dologin'); //
$routes->get('/register', 'Home::register');
$routes->get('/passreset', 'Home::passreset');

$routes->get('/studentprofile', 'Home::studentprofile');
$routes->get('/updateprofile', 'Home::updateprofile');
$routes->get('/editprofile', 'Home::editprofile');
$routes->get('/students', 'Home::students');
//$routes->get('/addvehicles', 'Home::addvehicles');

$routes->get('/reportcardnur', 'Home::reportcardnur');
$routes->get('/reportcardpry', 'Home::reportcardpry');
$routes->get('/reportcardjss', 'Staff::reportcardjss');
$routes->get('/reportcardsss', 'Staff::reportcardsss');
$routes->get('/observabletraitssss', 'Staff::observabletraitssss');
$routes->get('/observabletraitsjss', 'Staff::observabletraitsjss');
$routes->get('/subjectreport', 'Staff::subjectreport');
$routes->get('/applicationform', 'Home::applicationform');
$routes->get('/staffprofile', 'Home::staffprofile');
$routes->get('/updatestaffprofile', 'Home::updatestaffprofile');
$routes->get('/staffsetup', 'Home::staffsetup');
$routes->get('/assessmentsetup', 'Staff::assessmentsetup');
$routes->get('/subjectreport', 'Staff::subjectreport');
$routes->get('/markbroadsheetjss', 'Staff::markbroadsheetjss');
$routes->get('/markbroadsheetsss', 'Staff::markbroadsheetsss');
$routes->get('/classattendance', 'Staff::classattendance');
$routes->get('/classattendance', 'Staff::classattendance');
$routes->get('/billsetup', 'Staff::billsetup');
$routes->get('/awardsetup', 'Staff::awardsetup');
$routes->get('/traitssetup', 'Staff::traitssetup');
$routes->get('/affectiveareasetup', 'Staff::affectiveareasetup');
$routes->get('/socialhabitsetup', 'Staff::socialhabitsetup');
$routes->get('/commentssetup', 'Staff::commentssetup');

//$routes->get('/subjectsetup', 'Home::subjectsetup');
// $routes->get('/termsetup', 'Home::termsetup');

//$routes->get('/classsetup', 'Home::classsetup');
//$routes->get('/assignclasses', 'Home::assignclasses');
$routes->get('/populateclass', 'Home::populateclass');

// $routes->get('/populateclass', 'Home::populateclass');

$routes->group('student', ["filter" => "authfilter"], function($routes)
{
	//$routes->add('registration', 'StudentRegistration::registration');
	$routes->get('studentprofile', 'Home::studentprofile');
	$routes->get('registration', 'StudentRegistration::registration');
	$routes->post('postregistration', 'StudentRegistration::postregistration');
	$routes->get('registrationtable', 'StudentRegistration::registrationtable');
	$routes->post('editregistration', 'StudentRegistration::editregistration');
	$routes->post('updateregistration', 'StudentRegistration::updateregistration');
});
$routes->post('/refreshcsrf', 'StudentRegistration::refreshcsrf');

$routes->post('/refreshcsrf', 'StudentRegistration::refreshcsrf');

$routes->group('setup', ["filter" => "authfilter"], function($routes)
{
	// $routes->add('session', 				'Setup::session');
	$routes->get('session', 				'Setup::session');
	$routes->post('postsession', 			'Setup::postsession');
	$routes->get('sessiontable', 			'Setup::sessiontable'); 
	$routes->post('editsession', 			'Setup::editsession');
	$routes->post('updatesession', 			'Setup::updatesession');	

	//$routes->add('class', 				'Setup::class');
	$routes->get('class', 					'Setup::class');
	$routes->post('postclass', 				'Setup::postclass');
	$routes->get('classtable', 				'Setup::classtable');  
	$routes->post('editclass', 				'Setup::editclass');
	$routes->post('updateclass', 			'Setup::updateclass');	

	//$routes->add('class', 				'Setup::class');
	$routes->get('subjects', 				'Setup::subjects');
	$routes->post('postsubjects', 			'Setup::postsubjects');
	$routes->get('subjectstable', 			'Setup::subjectstable');  
	$routes->post('editsubjects', 			'Setup::editsubjects');
	$routes->post('updatesubjects', 		'Setup::updatesubjects');	

	$routes->get('studentbyclass', 		'StudentRegistration::studentByClass');	

	$routes->get('affectivearea', 		'Setup::affectiveArea');	
	$routes->post('fetchaffectivearea', 		'Setup::fetchAffectiveArea'); 
	$routes->get('affectiveAreatable', 		'Setup::affectiveAreaTable');  //
	$routes->post('postaffectiveArea', 		'Setup::postaffectiveArea');  //
	$routes->post('editratingsurl', 		'Setup::editratingsurl');  //
	$routes->post('updateaffectivearea', 		'Setup::updateAffectiveArea');  //
	$routes->get('assignclasses', 'Home::assignclasses');
});



$routes->group('staff', ["filter" => "authfilter"], function($routes)
{

	$routes->get('staffprofile', 'StaffSetups::staffprofile');
	$routes->get('staffsetup', 'StaffSetups::staffsetup');
	$routes->post('poststaff', 'StaffSetups::poststaff');
	$routes->get('stafftable', 'StaffSetups::stafftable');  //
	$routes->post('editstaff', 'StaffSetups::editstaff');
	$routes->post('updatestaff', 'StaffSetups::updatestaff');
});

$routes->post('/refreshcsrf', 'Gradebook::refreshcsrf');


$routes->group('gradebook', ["filter" => "authfilter"], function($routes)
{
	$routes->get('/', 'Gradebook::gradebooksetup');
	$routes->get('setup', 'Gradebook::gradebooksetup');
	$routes->get('gradebooktable', 'Gradebook::gradebooktable'); //
	$routes->post('postgradebook', 'Gradebook::postgradebook'); 
});


$routes->group('report', ["filter" => "authfilter"], function($routes)
{
	$routes->get('reportcard', 'Reports::reportcard');
	$routes->get('reportcardjss', 'Reports::reportcardjss');
	$routes->get('reportcardsss', 'Reports::reportcardsss');
	$routes->get('reportcardnur', 'Reports::reportcardnur');
	$routes->get('reportcardpry', 'Reports::reportcardpry');
	$routes->get('reportobservables', 'Reports::observables');
});

// postgradebook



/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
