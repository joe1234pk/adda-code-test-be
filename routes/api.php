<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' =>'APIS'],function(){

    Route::group(['prefix' =>'properties'],function(){
        Route::post('create', "PropertyController@store");
        Route::get('/{id}/analytics', "PropertyController@show");
        Route::get('suburbs/{suburb}/analytics', "PropertyController@getSuburbAnalyticsSummary");
        Route::get('states/{state}/analytics', "PropertyController@getStateAnalyticsSummary");
        Route::get('countries/{country}/analytics', "PropertyController@getCountryAnalyticsSummary");
    });
   
    Route::group(['prefix' =>'property-analtyic'],function(){
        Route::post('/create', "PropertyAnalyticController@store");
        Route::put('/update/{id}', "PropertyAnalyticController@update");
    });

   
});


