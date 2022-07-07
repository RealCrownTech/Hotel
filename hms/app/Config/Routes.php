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
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// $routes->get('/html-to-pdf', 'Home::invoice');

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');

$myroutes = [];
$myroutes['print/(:alpha)/(:num)'] = 'Home::convertToPdf/$1/$2';

//Login
$myroutes['login'] = 'Login::index';
$myroutes['logout'] = 'Login::logout';

//Lodge
$myroutes['checkIn'] = 'Lodge::check_in';
$myroutes['list-check-ins'] = 'Lodge::history';
$myroutes['list-check-outs'] = 'Lodge::logs';
$myroutes['invoice/(:num)'] = 'Lodge::invoice/$1';
$myroutes['receipt/(:num)'] = 'Lodge::receipt/$1';
$myroutes['checkOutGuest'] = 'Lodge::checkOutGuest';
$myroutes['swap/(:num)'] = 'Lodge::swap_room/$1';
$myroutes['editLodge/(:num)'] = 'Lodge::edit_lodge/$1';
$myroutes['doeditLodge/(:num)'] = 'Lodge::edit_lodge/$1';
$routes->post('ajax.room/fetchRoomOfID', 'Room::fetchRoomOfID');

//Reservation
$myroutes['reserve'] = 'Reservation::create';
$myroutes['reservations'] = 'Reservation::history';
$myroutes['reservation_receipt/(:num)'] = 'Reservation::receipt/$1';

//Payment
$myroutes['addpayment'] = 'Payment::create';
$myroutes['payments'] = 'Payment::allpayments';
$myroutes['payment_receipt/(:num)'] = 'Payment::receipt/$1';
$myroutes['print_payment_receipt/(:num)'] = 'Payment::payment_receipt/$1';

//Dashboard 
$myroutes['dashboard'] = 'Dashboard::index';

//User
$myroutes['addUser'] = 'User::create';
$myroutes['users'] = 'User::view';
$myroutes['editUser/(:num)'] = 'User::edit/$1';
$myroutes['deleteuser/(:num)'] = 'User::deleteUser/$1';

//Client
$myroutes['addClient'] = 'Client::create';
$myroutes['clients'] = 'Client::view';
$myroutes['viewProfile/(:num)'] = 'Client::profile/$1';
$myroutes['editClient/(:num)'] = 'Client::edit/$1';
$routes->post('ajax.client/fetchClientData', 'Client::fetchClientData');
$myroutes['deleteclient/(:num)'] = 'Client::deleteClient/$1';

//Rooms
$myroutes['rooms'] = 'Room::view';
$myroutes['createRoomType'] = 'Room::view/createRoomType';
$myroutes['createRoom'] = 'Room::view/createRoom';
$routes->post('ajax.room/edit', 'Room::editRoom');
$routes->post('ajax.room_type/edit', 'Room::editRoomType');
$myroutes['editRoom/(:num)'] = 'Room::editRooms/$1';
$myroutes['editRoomType/(:num)'] = 'Room::editRoomTypes/$1';
$myroutes['deleteroom/(:num)'] = 'Room::deleteRoom/$1';
$myroutes['deleteroomtype/(:num)'] = 'Room::deleteRoomType/$1';
$routes->post('ajax.room/fetchRoomOfID', 'Room::fetchRoomOfID');

//Food
$myroutes['foodItems'] = 'Food::index';
$routes->post('ajax.food/fetchFoodData', 'Food::fetchFoodData');
$routes->post('ajax.food/fetchAllFoodData', 'Food::fetchAllFoodData');
$myroutes['editFoodItem/(:num)'] = 'Food::edit/$1';
$myroutes['createOrder'] = 'Food::create';
$myroutes['allOrder'] = 'Food::orders';
$myroutes['viewFoodOrder/(:num)'] = 'Food::invoice/$1';
$routes->post('ajax.food/fetchGuestRoomAndData', 'Food::fetchGuestRoomAndData');
$myroutes['deletefood/(:num)'] = 'Food::deleteFood/$1';
$myroutes['deletefoodorder/(:num)'] = 'Food::deleteFoodOrder/$1';

//Stock
$myroutes['stockItems'] = 'Stock::index';
$routes->post('ajax.stock/fetchStockData', 'Stock::fetchStockData');
$routes->post('ajax.stock/fetchAllStockData', 'Stock::fetchAllStockData');
$myroutes['editStockItem/(:num)'] = 'Stock::edit/$1';
$myroutes['createStockOrder'] = 'Stock::create';
$myroutes['allStockOrder'] = 'Stock::orders';
$myroutes['viewStockOrder/(:num)'] = 'Stock::invoice/$1';
$routes->post('ajax.stock/fetchGuestRoomAndData', 'Stock::fetchGuestRoomAndData');
$myroutes['deletestock/(:num)'] = 'Stock::deleteStock/$1';
$myroutes['deletestockorder/(:num)'] = 'Stock::deleteStockOrder/$1';

//Settings
$myroutes['settings'] = 'Settings::index';
$myroutes['company_settings'] = 'Settings::company';
$myroutes['bank_settings'] = 'Settings::bank';
$myroutes['add_role'] = 'Settings::add_user_role';
$myroutes['privileges/(:num)'] = 'Settings::permission/$1';

//Transactions
$myroutes['transactions'] = 'Transactions::index';
$myroutes['print_invoice/(:num)'] = 'Transactions::invoice/$1';
$myroutes['print_order_invoice/(:num)'] = 'Transactions::order_invoice/$1';
$myroutes['print_receipt/(:num)'] = 'Transactions::receipt/$1';
$myroutes['print_reservation_receipt/(:num)'] = 'Transactions::reservation_receipt/$1';
$myroutes['close_account'] = 'Transactions::close_account';
$myroutes['download_sales_report'] = 'Transactions::download_sales_report';

//Amenities
$myroutes['amenitiesItems'] = 'Amenities::index';
$routes->post('ajax.amenities/fetchAmenitiesData', 'Amenities::fetchAmenitiesData');
$routes->post('ajax.amenities/fetchAllAmenitiesData', 'Amenities::fetchAllAmenitiesData');
$myroutes['editAmenitiesItem/(:num)'] = 'Amenities::edit/$1';
$myroutes['createAmenitiesOrder'] = 'Amenities::create';
$myroutes['allAmenitiesOrder'] = 'Amenities::orders';
$myroutes['viewAmenitiesOrder/(:num)'] = 'Amenities::invoice/$1';
$routes->post('ajax.amenities/fetchGuestRoomAndData', 'Amenities::fetchGuestRoomAndData');
$myroutes['deleteamenities/(:num)'] = 'Amenities::deleteAmenities/$1';
$myroutes['deleteamenitiesorder/(:num)'] = 'Amenities::deleteAmenitiesOrder/$1';


$routes->map($myroutes);

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
