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
Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');

Route::group(['middleware' => 'auth:api'], function()
{
    Route::prefix('api/v1')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', 'UserController@logout');

    JsonApi::register('default')->routes(function ($api) {
        $api->resource('users');

        $api->resource('projects', [
            'has-many' => ['memberships', 'playlists', 'scenarios', 'forms', 'checkpoints', 'designs'],
        ]);


        $api->resource('playlists')->relationships(function ($relations) {
            $relations->hasOne('project');
        });

        $api->resource('scenarios')->relationships(function ($relations) {
            $relations->hasOne('project');
        });

        $api->resource('forms')->relationships(function ($relations) {
            $relations->hasOne('project');
        });

        $api->resource('checkpoints')->relationships(function ($relations) {
            $relations->hasOne('project');
        });

        $api->resource('designs')->relationships(function ($relations) {
            $relations->hasOne('project');
        });
    });
});

