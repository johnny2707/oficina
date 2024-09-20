<?php

use App\Filters\AuthValidation;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Dashboard::index', ['filter' => 'authGuard']);

// AUTHENTICATION

$routes->group('auth', ['filter' => 'authValidation'], function($routes){
    $routes->get('/auth',                                  'Auth::index');
    $routes->post('/auth',                                 'Auth::login');
    $routes->get('/auth/recoverPassword',                  'Auth::recoverPassword');
    $routes->post('/auth/sendPasswordEmail',               'Auth::sendPasswordEmail');
    $routes->get('/auth/changePassword/(:segment)',        'Auth::changePassword/$1');
    $routes->get('/auth/emailSentConfirmation/(:segment)', 'Auth::emailSentConfirmation/$1');
    $routes->post('/auth/updatePassword',                  'Auth::updatePassword');
});

$routes->get('/auth/logout',                           'Auth::logout', ['filter' => 'authGuard']);

// Users |permissionsValidation:USERS,ALL

$routes->group("users", ['filter' => 'authGuard'], function($routes){
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