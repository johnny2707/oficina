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
    $routes->get('/',                                  'Auth::index');
    $routes->post('/',                                 'Auth::login');
});

$routes->get('/auth/recoverPassword',                  'Auth::recoverPassword');
$routes->post('/auth/sendPasswordEmail',               'Auth::sendPasswordEmail');
$routes->get('/auth/changePassword/(:segment)',        'Auth::changePassword/$1');
$routes->get('/auth/emailSentConfirmation/(:segment)', 'Auth::emailSentConfirmation/$1');
$routes->post('/auth/updatePassword',                  'Auth::updatePassword');
$routes->get('/auth/logout',                           'Auth::logout', ['filter' => 'authGuard']);


//CLIENTS

$routes->group('clients', ['filter' => 'authGuard|permissionsValidation:COSTUMERS, ALL'], function($routes){
    $routes->get('/',                             'Clients::index');
    $routes->get('createClientPage',              'Clients::createClientLoadPage');
    $routes->post('createClient',                 'Clients::createNewClient');
    $routes->get('updateClientPage/(:hash)',      'Clients::updateClientLoadPage/$1');
    $routes->post('updateClientInfo',             'Clients::updateClientInfo');
    $routes->post('updateContactInfo',            'Clients::updateContactInfo');
    $routes->post('updateCarInfo',                'Clients::updateCarInfo');
    $routes->get('addClientInfoPage/(:hash)',     'Clients::addClientInfoPage/$1');
    $routes->post('addContact',                   'Clients::addContact');
    $routes->post('addCar',                       'Clients::addCar');
    $routes->get('listAllClients',                'Clients::listAllClientsLoadPage');
    $routes->post('listAllClients',               'Clients::listAllClients');
    $routes->get('showClientPage/(:hash)',        'Clients::showClientLoadPage/$1');
    $routes->post('deleteClient',                 'Clients::deleteClient');
});

$routes->get('seeder', 'Clients::Seeder');


//VEHICLES

$routes->group('vehicles', ['filter' => 'authGuard|permissionsValidation:VEHICLES, ALL'], function($routes){
    $routes->post('getAllVehicles', 'Clients::getAllVehicles');
});

//MECHANICS

$routes->group('mechanics', ['filter' => 'authGuard|permissionsValidation:MECHANICS, ALL'], function($routes){
    $routes->get('/',                             'Mechanics::index');
    $routes->get('createMechanicPage',            'Mechanics::createMechanicLoadPage');
    $routes->post('createMechanic',               'Mechanics::createNewMechanic');
    $routes->get('updateMechanicPage/(:hash)',    'Mechanics::updateMechanicLoadPage/$1');
    $routes->post('updateMechanicInfo',           'Mechanics::updateMechanicInfo');
    $routes->post('updateContactInfo',            'Mechanics::updateContactInfo');
    $routes->get('listAllMechanics',              'Mechanics::listAllMechanicsLoadPage');
    $routes->post('listAllMechanics',             'Mechanics::listAllMechanics');
    $routes->get('showMechanicPage/(:hash)',      'Mechanics::showMechanicLoadPage/$1');
    $routes->post('deleteMechanic',               'Mechanics::deleteMechanic');
});

$routes->get('seeder', 'Clients::Seeder');


//EVENTS

$routes->group('events', ['filter' => 'authGuard|permissionsValidation: EVENTS, ALL'], function($routes){
    $routes->get('/',                        'Events::index');
    $routes->get('createEventPage',          'Events::createEventLoadPage');
    $routes->post('createEvent',             'Events::createEvent');
    $routes->get('listAllEvents',            'Events::listAllEvents');
    $routes->post('listOfEvents',            'Events::listOfEvents');
    $routes->get('updateEventPage/(:num)',   'Events::updateEventLoadPage/$1');
    $routes->post('updateEvent',             'Events::updateEvent');
});


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
