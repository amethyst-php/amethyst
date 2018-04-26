<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

if (!function_exists('rest')) {
    function rest($prefix, $controller, $group = null)
    {
        Route::group(['prefix' => $prefix], function () use ($controller, $group) {
            $group && is_callable($group) && $group($controller);

            Route::get('/', ['uses' => $controller.'@index']);
            Route::post('/', ['uses' => $controller.'@create']);
            Route::put('/{id}', ['uses' => $controller.'@update']);
            Route::delete('/{id}', ['uses' => $controller.'@remove']);
            Route::get('/{id}', ['uses' => $controller.'@show']);
        });
    }
}

Route::group(['prefix' => 'api/v1'], function () {
    Route::post('/sign-in', ['as' => 'login', 'uses' => 'Railken\LaraOre\Api\Http\Controllers\Auth\SignInController@signIn']);
    Route::post('/sign-up', ['uses' => 'Railken\LaraOre\Api\Http\Controllers\Auth\RegistrationController@index']);
    Route::post('/confirm-email', ['uses' => 'Railken\LaraOre\Api\Http\Controllers\Auth\RegistrationController@confirmEmail']);
    Route::post('/request-confirm-email', ['uses' => 'Railken\LaraOre\Api\Http\Controllers\Auth\RegistrationController@requestConfirmEmail']);

    Route::post('/oauth/{name}/access_token', ['uses' => 'Railken\LaraOre\Api\Http\Controllers\Auth\SignInController@accessToken']);
    Route::post('/oauth/{name}/exchange_token', ['uses' => 'Railken\LaraOre\Api\Http\Controllers\Auth\SignInController@exchangeToken']);

    Route::post('/files/upload', ['uses' => 'Railken\LaraOre\Api\Http\Controllers\File\FilesController@upload']);
    Route::get('/files/{token}', ['uses' => 'Railken\LaraOre\Api\Http\Controllers\File\FilesController@get']);
    Route::delete('/files/{token}', ['uses' => 'Railken\LaraOre\Api\Http\Controllers\File\FilesController@remove']);

    Route::group(['middleware' => ['auth:api']], function () {
        Route::group(['prefix' => 'notifications'], function () {
            Route::get('/', ['uses' => 'Railken\LaraOre\Api\Http\Controllers\User\NotificationsController@index']);
            Route::get('/{id}', ['uses' => 'Railken\LaraOre\Api\Http\Controllers\User\NotificationsController@show']);
            Route::post('/{id}/read', ['uses' => 'Railken\LaraOre\Api\Http\Controllers\User\NotificationsController@markAsRead']);
            Route::post('/{id}/unread', ['uses' => 'Railken\LaraOre\Api\Http\Controllers\User\NotificationsController@markAsUnread']);
        });

        Route::get('/user', ['uses' => 'Railken\LaraOre\Api\Http\Controllers\User\UserController@index']);
    });

    Route::group(['namespace' => 'Railken\LaraOre\Api\Http\Controllers\Admin', 'middleware' => ['auth:api', 'admin'], 'prefix' => 'admin'], function () {

        rest('http-logs', 'HttpLogsController');

        # Storage
        rest('disks', 'DisksController');
        rest('files', 'FilesController');
        Route::post('/files/upload', ['uses' => 'FilesController@upload']);

        # Configs
        Route::group(['prefix' => 'configs'], function () {
            Route::get('/', ['uses' => 'ConfigsController@index']);
            Route::patch('/', ['uses' => 'ConfigsController@update']);
        });

        # Users
        rest('users', 'UsersController');
        // Customer?
        rest('addresses', 'AddressesController');

        # Event driven data
        rest('listeners', 'ListenersController');

        rest('action-notifications', 'ActionNotificationsController', function ($controller) {
            Route::post('/render', ['uses' => $controller.'@renderTemplate']);
        });

        rest('action-emails', 'ActionEmailsController', function ($controller) {
            Route::post('/render', ['uses' => $controller.'@renderTemplate']);
        });

        Route::group(['prefix' => 'mail-logs'], function () {
            Route::get('/', ['uses' => 'MailLogsController@index']);
            Route::delete('/{id}', ['uses' => 'MailLogsController@remove']);
            Route::get('/{id}', ['uses' => 'MailLogsController@show']);
        });

        # Logs
        rest('event-logs', 'EventLogsController', function ($controller) {
            Route::get('/stats', ['uses' => $controller.'@stats']);
        });

        Route::group(['prefix' => 'logs'], function () {
            Route::get('/', ['uses' => 'LogsController@index']);
            Route::delete('/{id}', ['uses' => 'LogsController@remove']);
            Route::get('/{id}', ['uses' => 'LogsController@show']);
        });

    });
});
