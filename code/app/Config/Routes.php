<?php

use App\Filters\AuthValidation;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Dashboard::index', ['filter' => 'authGuard']);

// AUTHENTICATION

$routes->group('auth', ['filter' => 'authValidation'], function($routes){
    $routes->get('/',                                  'Auth::index');
    $routes->post('/',                                 'Auth::login');
    $routes->get('/recoverPassword',                  'Auth::recoverPassword');
    $routes->post('/sendPasswordEmail',               'Auth::sendPasswordEmail');
    $routes->get('/changePassword/(:segment)',        'Auth::changePassword/$1');
    $routes->get('/emailSentConfirmation/(:segment)', 'Auth::emailSentConfirmation/$1');
    $routes->post('/updatePassword',                  'Auth::updatePassword');
});

$routes->get('/auth/logout',                           'Auth::logout', ['filter' => 'authGuard']);

//CLIENTS |permissionValidation:CLIENTS,ALL

$routes->get('/clients',  'Clients::index', ['filter' => 'authGuard']);
$routes->post('/clients', 'Clients::createNewClient', ['filter' => 'authGuard']);

//USERS

$routes->group("users", ['filter' => 'authGuard|permissionsValidation:USERS,ALL'], function($routes){
    $routes->get('/',                   'Users::index');
    $routes->get('table',               'Users::populateUsersTable');
    $routes->get('create',              'Users::create');
    $routes->post('create',             'Users::createNewUser');
    $routes->get('(:hash)/update',      'Users::update/$1');
    $routes->post('(:hash)/update',     'Users::updateUser/$1');
    $routes->post('(:hash)/activate',   'Users::activateUser/$1');
    $routes->post('(:hash)/inactivate', 'Users::inactivateUser/$1');
});

$routes->get('/users/my-password',  'Users::myPassword', ['filter' => 'authGuard']);
$routes->post('/users/my-password', 'Users::updateMyPassword', ['filter' => 'authGuard']);