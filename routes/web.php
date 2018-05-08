<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::auth();

Route::group(['middleware' => 'auth'],function(){

	Route::get('/','MainController@index');

	Route::get('master/rute','MasterController@rute');
	Route::post('rute/save','MasterController@save_the_rute');
	Route::post('rute/update','MasterController@update_the_rute');
	Route::get('rute/delete/{id}','MasterController@delete_the_rute');

	Route::get('master/transportation_type','MasterController@transport_type');
	Route::post('transport_type/save','MasterController@save_the_transport_type');
	Route::post('transport_type/update','MasterController@update_the_transport_type');
	Route::get('transport_type/delete/{id}','MasterController@delete_the_transport_type');

	Route::get('master/transportation','MasterController@transportation');
	Route::get('getRandomCode/{id}','MasterController@generateRandomCode');
	Route::post('transportation/save','MasterController@save_the_transportation');
	Route::post('transportation/update','MasterController@update_the_transportation');
	Route::get('transportation/delete/{id}','MasterController@delete_the_transportation');


	Route::get('master/stasiun','MasterController@stasiun');

	Route::get('checkCust/{id}','TransactionController@checkCustomer');
	Route::post('stasiun/save','MasterController@save_the_station');
	// Route::post('stasiun/update','MasterController@update_the_station');
	Route::post('stasiun/changeUpdate','MasterController@update_station');

	Route::get('stasiun/delete/{id}','MasterController@delete_the_station');

	Route::get('getRute/{event1}/{event2}/{event3}',[
		'as' => 'report','uses' => 'TransactionController@getRuteFromTo'
	]);

	Route::get('getRute_multi/{event1}/{event2}/{event3}/{event4}',[
		'as' => 'report','uses' => 'TransactionController@getRuteFromTo_multi'
	]);

	Route::get('transaction/reserve/step_2/{event1}/{event2}/{event3}','TransactionController@reserve_step2');
	Route::get('transaction/reserve/step_3/{event1}/{event2}/{event3}','TransactionController@reserve_step3');

	Route::get('transaction/reservation_mult/MULTI/step_2/{event1}/{event2}/{event4}/{event3}','TransactionController@reserve_step2_multi');


	Route::get('transaction/reservation/{event}','TransactionController@reservation');
	Route::get('getSeat/{event1}/{event2}/{event3}',[
		'as' => 'report','uses' => 'TransactionController@getSeatByIDTransport'
	]);

	Route::get('transaction/reservation_mult/{event1}/{event2}',[
		'as' => 'report','uses' => 'TransactionController@multiReservation'
	]);

	Route::get('getDataReserveByDate/{event1}/{event2}',[
		'as' => 'report','uses' => 'ReportController@reservation_filtered'
	]);

	Route::get('getEarning/{event1}/{event2}/{event3}',[
		'as' => 'report','uses' => 'ReportController@getEarningByDate'
	]);

	Route::get('getDataReserveAll','ReportController@reservation_all');

	Route::get('getEarningAll/{id}','ReportController@earn_all');

	Route::post('transaction/save','TransactionController@save_em_up');
	Route::post('transaction/save_multi','TransactionController@save_em_up_multi');

	// Route::get('checkout_transaction/{id}','TransactionController@printCheckout');

	Route::get('checkout_transaction/{event1}/{event2}',[
			'as' => 'report','uses' => 'TransactionController@printCheckout'
		]);

	Route::get('getName/{id}','TransactionController@getNameCustomer');
	Route::get('getAddress/{id}','TransactionController@getAddressCustomer');
	Route::get('getPhone/{id}','TransactionController@getPhoneCustomer');
	Route::get('getGender/{id}','TransactionController@getGenderCustomer');


	Route::get('getDataReserve/{event1}/{event2}',[
			'as' => 'report','uses' => 'TransactionController@get_data_reserve'
		]);

	Route::get('booking/cancel/{id}','TransactionController@cancel_booking');

	Route::get('report/report_customer','ReportController@customer');
	Route::get('report/report_transportation','ReportController@transportation');
	Route::get('report/report_rute','ReportController@rute');
	Route::get('report/report_reservation','ReportController@reservation');

	Route::get('report/report_depparture/{id}','ReportController@depparture');
	Route::get('report/report_depparture2/{id}','ReportController@depparture2');
	Route::get('report/report_earning/{id}','ReportController@earning');

	Route::post('saveUser','MasterController@user_save');
	Route::post('updateUser','MasterController@user_update');
	Route::get('deleteUser/{id}','MasterController@user_delete');

	Route::post('upload_station','MasterController@uploadStat');
	Route::get('download_template_station','MasterController@template_station');
	Route::post('save_import_station','MasterController@save_import_station_up');

	Route::get('report/report_periode_transaction','ReportController@periode_transaction');

	Route::get('getPeriodeTransactionFilter/{event1}/{event2}',[
			'as' => 'report','uses' => 'ReportController@TransactionPeriodeFilter'
		]);

	Route::get('master/airport','MasterController@airport');
	Route::post('airport/save','MasterController@save_the_airport');
	Route::post('airport/changeUpdate','MasterController@update_the_airport');
	Route::get('airport/delete/{id}','MasterController@delete_the_airport');

	Route::get('getDataStation','MasterController@dummyStation');
	Route::get('getDataAirport_d','MasterController@dummyAirport');

	Route::get('checkTanggal/{id}','TransactionController@checkTanggal');

});


