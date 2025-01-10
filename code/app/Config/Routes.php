<?php

use App\Filters\AuthGuard;
use App\Filters\AuthValidation;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/', 'Dashboard::index', ['filter' => 'authGuard']);

$routes->get('fatura/criar',               'Fatura::criar');

$routes->get('clock', 'Clock::index');


// AUTHENTICATION

$routes->group('auth', ['filter' => 'authValidation'], function($routes){
    $routes->get('/',                                  'Auth::showLoginPage');
    $routes->post('/',                                 'Auth::login');
});

$routes->get('/auth/recoverPassword',                  'Auth::recoverPassword');
$routes->post('/auth/sendPasswordEmail',               'Auth::sendPasswordEmail');
$routes->get('/auth/changePassword/(:segment)',        'Auth::changePassword/$1');
$routes->get('/auth/emailSentConfirmation/(:segment)', 'Auth::emailSentConfirmation/$1');
$routes->post('/auth/updatePassword',                  'Auth::updatePassword');
$routes->get('/auth/logout',                           'Auth::logout', ['filter' => 'authGuard']);

// PRODUCTS 

$routes->group('products', ['filter' => 'authGuard|permissionsValidation: PRODUCTS, ALL'], function($routes){
    $routes->post('getProductByCode', 'Products::getProductByCode');
    $routes->get('getAllProducts',    'Products::getAllProducts');
});

//CLIENTS

$routes->group('clients', ['filter' => 'authGuard|permissionsValidation:CLIENTS, ALL'], function($routes){
    $routes->get('create',              'Clients::createClientPage');
    $routes->post('createClient',       'Clients::createClient');
});

//VEHICLES

$routes->group('vehicles', ['filter' => 'authGuard|permissionsValidation: VEHICLES, ALL'], function($routes){
    $routes->get('getAllVehicles',            'Vehicles::getAllVehicles');
    $routes->post('getVehicleByLicensePlate', 'Vehicles::getVehicleByLicensePlate');
});

//USERS

$routes->get('users/createAccount/(:segment)',  'Users::createAccountPage/$1');
$routes->post('users/createAccount/(:segment)', 'Users::createAccount/$1');

$routes->group("users", ['filter' => 'authGuard|permissionsValidation: USERS, ALL'], function($routes){
    $routes->get('/',                   'Users::index');
    $routes->get('table',               'Users::populateUsersTable');
    $routes->get('(:hash)/update',      'Users::update/$1');
    $routes->post('(:hash)/update',     'Users::updateUser/$1');
    $routes->post('(:hash)/activate',   'Users::activateUser/$1');
    $routes->post('(:hash)/inactivate', 'Users::inactivateUser/$1');
});

$routes->get('/users/my-password',  'Users::myPassword', ['filter' => 'authGuard']);
$routes->post('/users/my-password', 'Users::updateMyPassword', ['filter' => 'authGuard']);
