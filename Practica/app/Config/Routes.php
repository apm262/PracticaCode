<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/* NAMESPACE  */

if(!defined('ADMIN_NAMESPACE')) define('ADMIN_NAMESPACE', "App/Controllers/Administration");
if(!defined('PUBLIC_NAMESPACE')) define('PUBLIC_NAMESPACE', "App/Controllers/PublicSection");

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/login', 'LoginController::index', ['as' => "login" , 'namespace' => PUBLIC_NAMESPACE]);
$routes->post('/login/save', 'LoginController::verify', ['as' => "save_login" , 'namespace' => PUBLIC_NAMESPACE]);
$routes->get('/home', 'HomeController::index', ['as' => "home_public" , 'namespace' => PUBLIC_NAMESPACE]);
$routes->get('/home/admin', 'HomeController::index', ['as' => "home_admin" , 'namespace' => ADMIN_NAMESPACE]);



/*
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
