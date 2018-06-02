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

Route::group(['namespace' => 'Railken\LaraOre\Api\Http\Controllers', 'prefix' => 'api/v1'], function () {

    
    Route::post('/sign-up', ['uses' => 'User\RegistrationController@index']);
    Route::post('/confirm-email', ['uses' => 'User\RegistrationController@confirmEmail']);
    Route::post('/request-confirm-email', ['uses' => 'User\RegistrationController@requestConfirmEmail']);

    Route::post('/sign-in', ['uses' => 'User\SignInController@signIn']);

    Route::post('/oauth/{name}/access_token', ['uses' => 'User\SignInController@accessToken']);
    Route::post('/oauth/{name}/exchange_token', ['uses' => 'User\SignInController@exchangeToken']);
    
    //Route::post('/files/upload', ['uses' => 'File\FilesController@upload']);
    //Route::get('/files/{token}', ['uses' => 'File\FilesController@get']);
    //Route::delete('/files/{token}', ['uses' => 'File\FilesController@remove']);

    Route::group(['middleware' => ['auth:api']], function () {
        Route::group(['prefix' => 'notifications'], function () {
            Route::get('/', ['uses' => 'User\NotificationsController@index']);
            Route::get('/{id}', ['uses' => 'User\NotificationsController@show']);
            Route::post('/{id}/read', ['uses' => 'User\NotificationsController@markAsRead']);
            Route::post('/{id}/unread', ['uses' => 'User\NotificationsController@markAsUnread']);
        });

        Route::get('/user', ['uses' => 'User\UserController@index']);
    });

    Route::group(['namespace' => 'Admin', 'middleware' => ['auth:api', 'admin'], 'prefix' => 'admin'], function () {


        rest('users', 'UsersController');
        rest('configs', 'ConfigsController');
        rest('works', 'WorksController');
        # Storage
        /*

        rest('http-logs', 'HttpLogsController');
        rest('disks', 'DisksController');
        rest('files', 'FilesController');
        Route::post('/files/upload', ['uses' => 'FilesController@upload']);

        # Configs
        Route::group(['prefix' => 'configs'], function () {
            Route::get('/', ['uses' => 'ConfigsController@index']);
            Route::patch('/', ['uses' => 'ConfigsController@update']);
        });

        # Users
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

        rest('report-pdf', 'ReportPdfController', function ($controller) {
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
        */
    });
});
