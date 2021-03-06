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
$routes->setDefaultController('LoginController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/* NAMESPACE  */

if(!defined('ADMIN_NAMESPACE')) define('ADMIN_NAMESPACE', "App/Controllers/Administration");
if(!defined('PUBLIC_NAMESPACE')) define('PUBLIC_NAMESPACE', "App/Controllers/PublicSection");
if(!defined('REST_NAMESPACE')) define('REST_NAMESPACE', "App/Controllers/Rest");

if(!defined('COMMAND_NAMESPACE')) define('COMMAND_NAMESPACE', "App/Controllers/Command");

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');

//$routes->get('/', 'LoginController::index', ['as' => "login" ,'filter' => 'login_auth', 'namespace' => PUBLIC_NAMESPACE]);
//$routes->post('/login/save', 'LoginController::verify', ['as' => "verify_login" , 'namespace' => PUBLIC_NAMESPACE]);
//$routes->get('/home', 'HomeController::index', ['as' => "home_public" , 'namespace' => PUBLIC_NAMESPACE]);
//$routes->get('/home/admin', 'HomeController::index', ['as' => "home_admin" , 'namespace' => ADMIN_NAMESPACE]);


//----------------PUBLIC ROUTES-------------
$routes->group('',function($routes){
    $routes->get('/', 'LoginController::index', ['as' => "login" ,'filter' => 'login_auth', 'namespace' => PUBLIC_NAMESPACE]);
    $routes->post('/login/save', 'LoginController::verify', ['as' => "verify_login" , 'namespace' => PUBLIC_NAMESPACE]);
    $routes->get('/home', 'HomeController::index', ['as' => "home_public" ,'filter' => 'public_auth', 'namespace' => PUBLIC_NAMESPACE]);
    $routes->get('/logout', 'LogoutController::index', ['as' => "logout" , 'namespace' => PUBLIC_NAMESPACE]);
});

//----------------PRIVATE ROUTES-------------
$routes->group('admin',function($routes){
    $routes->get('home_admin', 'HomeController::index', ['as' => "home_admin" ,'filter' => 'private_auth', 'namespace' => ADMIN_NAMESPACE]);
    $routes->get('usuarios', 'UsuariosController::index', ['as' => "usuarios" ,'filter' => 'private_auth', 'namespace' => ADMIN_NAMESPACE]);
    $routes->get('festivales', 'FestivalesController::index', ['as' => "festivales" ,'filter' => 'private_auth', 'namespace' => ADMIN_NAMESPACE]);

    $routes->get('categorias', 'CategoriesController::index', ['as' => "categorias" ,'filter' => 'private_auth', 'namespace' => ADMIN_NAMESPACE]);
    $routes->get('roles', 'RolesController::index', ['as' => "roles" ,'filter' => 'private_auth', 'namespace' => ADMIN_NAMESPACE]);


    $routes->post('mostrar_festivales', 'FestivalesController::getFestivalsData', ['as' => "mostrar_festivales" ,'filter' => 'private_auth', 'namespace' => ADMIN_NAMESPACE]);
    $routes->delete('delete_festivales', 'FestivalesController::deleteFest', ['as' => "delete_festivales" ,'filter' => 'private_auth', 'namespace' => ADMIN_NAMESPACE]);

    //Nuevo y editar
    $routes->get('festivals/view/edit', 'FestivalesController::viewEditFestival', ['as' => 'festivals_view_edit' ,'filter' => 'private_auth', 'namespace' => ADMIN_NAMESPACE]);
    $routes->get('festivals/view/edit/(:any)', 'FestivalesController::viewEditFestival/$1', ['filter' => 'private_auth', 'namespace' => ADMIN_NAMESPACE]);

});

//---------------API REST ROUTES-------------
$routes->group('rest',function($routes){
    $routes->get('categories', 'CategoriesController::index', ['namespace' => REST_NAMESPACE]);
    $routes->delete('categories', 'CategoriesController::deleteCategory', ['namespace' => REST_NAMESPACE]);
    $routes->post('categories', 'CategoriesController::modifyAdd', ['namespace' => REST_NAMESPACE]);
});

$routes->group('comands',function($routes){
    $routes->cli('comando_uno', 'PrimerosComands::comandoUno', ['namespace' => COMMAND_NAMESPACE]);
    $routes->cli('comando_dos', 'PrimerosComands::comandoDos', ['namespace' => COMMAND_NAMESPACE]);
    $routes->cli('comando_tres', 'PrimerosComands::comandoTres', ['namespace' => COMMAND_NAMESPACE]);
});

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
