<?php

use App\Filters\AuthGuard;
use App\Filters\AuthValidation;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('clock', 'Clock::index');

$routes->get('/', 'Dashboard::index', ['filter' => 'authGuard']);

// AUTHENTICATION

$routes->group('auth', ['filter' => 'authValidation'], function($routes){
    $routes->get('/',                                'Auth::index');
    $routes->post('/',                               'Auth::login');
    $routes->get('recoverPassword',                  'Auth::recoverPassword');
    $routes->post('sendPasswordEmail',               'Auth::sendPasswordEmail');
    $routes->get('changePassword/(:segment)',        'Auth::changePassword/$1');
    $routes->get('emailSentConfirmation/(:segment)', 'Auth::emailSentConfirmation/$1');
    $routes->post('updatePassword',                  'Auth::updatePassword');
});

$routes->get('/auth/logout',                         'Auth::logout', ['filter' => 'authGuard']);

//CLIENTS |permissionValidation:CLIENTS,ALL

$routes->group('clients', ['filter' => 'authGuard|permissionsValidation:ALL'], function($routes){
    $routes->get('/',                             'Clients::index');
    $routes->get('createClientPage',              'Clients::createClientLoadPage');
    $routes->post('createClient',                 'Clients::createNewClient');
    $routes->get('updateClientPage/(:hash)',      'Clients::updateClientLoadPage/$1');
    $routes->post('updateClient',                 'Clients::updateClient');
    $routes->get('addContactPage/(:hash)',        'Clients::addContactPage');
    $routes->post('addContact',                   'Clients::addContact');
    $routes->get('addCarPage/(:hash)',            'Clients::addCarPage');
    $routes->post('addCar',                       'Clients::addCar');
    $routes->get('listAllClients',                'Clients::listAllClientsLoadPage');
    $routes->post('listAllClients',               'Clients::listAllClients');
    $routes->get('showClientPage/(:hash)',        'Clients::showClientLoadPage/$1');
    $routes->post('deleteClient',                 'Clients::deleteClient');
});

$routes->get('seeder', 'Clients::Seeder');

//USERS

$routes->get('users/createAccount/(:segment)',  'Users::createAccountPage/$1');
$routes->post('users/createAccount/(:segment)', 'Users::createAccount/$1');

// $routes->group("users", ['filter' => 'authGuard|permissionsValidation:USERS,ALL'], function($routes){
//     $routes->get('/',                   'Users::index');
//     $routes->get('table',               'Users::populateUsersTable');
//     $routes->get('create',              'Users::create');
//     $routes->post('create',             'Users::createNewUser');
//     $routes->get('(:hash)/update',      'Users::update/$1');
//     $routes->post('(:hash)/update',     'Users::updateUser/$1');
//     $routes->post('(:hash)/activate',   'Users::activateUser/$1');
//     $routes->post('(:hash)/inactivate', 'Users::inactivateUser/$1');
// });

// $routes->get('/users/my-password',  'Users::myPassword', ['filter' => 'authGuard']);
// $routes->post('/users/my-password', 'Users::updateMyPassword', ['filter' => 'authGuard']);
