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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('document/archive','API\DocumentController@getArchive');
Route::middleware('api')->get('document/archiver/{id}','API\DocumentController@archiverDocument');
Route::middleware('api')->get('document/desarchiver/{id}','API\DocumentController@desarchiverDocument');

Route::apiResources([
    'document' => 'API\DocumentController'
]);

Route::apiResources([
    'document' => 'API\DocumentController'
]);

Route::apiResources([
    'etape' => 'API\EtapeController'
]);

Route::apiResources([
    'scenario' => 'API\ScenarioController'
]);

Route::apiResources([
    'suivi' => 'API\SuiviController'
]);
