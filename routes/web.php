<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Log;
use JildertMiedema\LaravelPlupload\Facades\Plupload;

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth', 'menu', 'site']], function () {
    Route::get('/dashboard' ,'HomeController@dashboard');

    Route::get( '/user', 'UserController@index' );
    Route::post( '/user', 'UserController@index' );
    Route::get( '/user/add', 'UserController@create' );
    Route::post( '/user/save', 'UserController@store' );
    Route::get( '/user/{id}/edit', 'UserController@edit' );
    Route::get( '/user/{id}/delete', 'UserController@destroy' );
    Route::post( '/user/{id}/update', 'UserController@update' );

    // Role
    Route::get('/role', 'RoleController@index')->name('role');
    Route::get('/role/add', 'RoleController@create')->name('role.add');
    Route::post('/role/save', 'RoleController@store')->name('role.add');
    Route::get('/role/{id}/edit', 'RoleController@edit')->name('role.edit');
    Route::post('/role/{id}/update', 'RoleController@update')->name('role.edit');
    Route::get('/role/{id}/delete', 'RoleController@destroy')->name('role.delete');

    // Permission
    Route::get('/permission', 'PermissionController@index')->name('permission');
    Route::get('/permission/add', 'PermissionController@create')->name('permission.add');
    Route::post('/permission/save', 'PermissionController@store')->name('permission.add');
    Route::get('/permission/{id}/edit', 'PermissionController@edit')->name('permission.edit');
    Route::post('/permission/{id}/update', 'PermissionController@update')->name('permission.edit');
    Route::get('/permission/{id}/delete', 'PermissionController@destroy')->name('permission.delete');

    Route::get('/user-profile/{id}', 'UserController@profile');
    Route::get('/user-profile/{id}/edit', 'UserController@editProfile');
    Route::post('/user-profile/{id}/update', 'UserController@updateProfile');
    Route::post('/user-profile/{id}/update-avatar', 'UserController@updateAvatar');
    Route::post('/user-profile/{id}/update-password', 'UserController@updatePassword');

    Route::get( '/site', 'SiteController@index' );
    Route::get( '/site/add', 'SiteController@create' );
    Route::post( '/site/save', 'SiteController@store' );
    Route::get( '/site/{id}/edit', 'SiteController@edit' );
    Route::post( '/site/{id}/update', 'SiteController@update' );
    Route::get( '/site/{id}/delete', 'SiteController@destroy' );

    Route::get( '/menu', 'MenuController@index' );
    Route::get( '/menu/add', 'MenuController@create' );
    Route::post( '/menu/save', 'MenuController@store' );
    Route::get( '/menu/{id}/edit', 'MenuController@edit' );
    Route::post( '/menu/{id}/update', 'MenuController@update' );
    Route::get( '/menu/{id}/delete', 'MenuController@destroy' );

    Route::get( '/asset-condition', 'AssetConditionController@index' );
    Route::get( '/asset-condition/add', 'AssetConditionController@create' );
    Route::post( '/asset-condition/save', 'AssetConditionController@store' );
    Route::get( '/asset-condition/{id}/edit', 'AssetConditionController@edit' );
    Route::post( '/asset-condition/{id}/update', 'AssetConditionController@update' );
    Route::get( '/asset-condition/{id}/delete', 'AssetConditionController@destroy' );

    Route::get( '/asset-performance', 'AssetPerformanceController@index' );
    Route::get( '/asset-performance/add', 'AssetPerformanceController@create' );
    Route::post( '/asset-performance/save', 'AssetPerformanceController@store' );
    Route::get( '/asset-performance/{id}/edit', 'AssetPerformanceController@edit' );
    Route::post( '/asset-performance/{id}/update', 'AssetPerformanceController@update' );
    Route::get( '/asset-performance/{id}/delete', 'AssetPerformanceController@destroy' );

    Route::get( '/asset-type', 'AssetTypeController@index' );
    Route::get( '/asset-type/add', 'AssetTypeController@create' );
    Route::post( '/asset-type/save', 'AssetTypeController@store' );
    Route::get( '/asset-type/{id}/edit', 'AssetTypeController@edit' );
    Route::post( '/asset-type/{id}/update', 'AssetTypeController@update' );
    Route::get( '/asset-type/{id}/delete', 'AssetTypeController@destroy' );

    Route::get( '/asset-location', 'AssetLocationController@index' );
    Route::get( '/asset-location/add', 'AssetLocationController@create' );
    Route::post( '/asset-location/save', 'AssetLocationController@store' );
    Route::get( '/asset-location/{id}/edit', 'AssetLocationController@edit' );
    Route::post( '/asset-location/{id}/update', 'AssetLocationController@update' );
    Route::get( '/asset-location/{id}/delete', 'AssetLocationController@destroy' );

    Route::get('/asset', 'AssetController@index');
    Route::post('/asset', 'AssetController@index');
    Route::get('/asset/add', 'AssetController@create');
    Route::post('/asset/save', 'AssetController@store');
    Route::get('/asset/{id}/edit', 'AssetController@edit');
    Route::post('/asset/{id}/update', 'AssetController@update');
    Route::get('/asset/{id}/detail', 'AssetController@detail');
    Route::get('/asset/{id}/delete', 'AssetController@destroy');

    Route::get('/asset-by-group/{group}', 'AssetByGroupController@index');
    Route::post('/asset-by-group/{group}', 'AssetByGroupController@index');
    Route::get('/asset-by-group/{group}/add', 'AssetByGroupController@create');
    Route::post('/asset-by-group/{group}/save', 'AssetByGroupController@store');
    Route::get('/asset-by-group/{group}/{id}/edit', 'AssetByGroupController@edit');
    Route::post('/asset-by-group/{group}/{id}/update', 'AssetByGroupController@update');
    Route::get('/asset-by-group/{group}/{id}/detail', 'AssetByGroupController@detail');
    Route::get('/asset-by-group/{group}/{id}/delete', 'AssetByGroupController@destroy');

    Route::get('/maintenance/{group}/{assetId}/add', 'MaintenanceController@create');
    Route::post('/maintenance/{group}/{assetId}/save', 'MaintenanceController@store');
    Route::get('/maintenance/{group}/{assetId}/{id}/edit', 'MaintenanceController@edit');
    Route::post('/maintenance/{group}/{assetId}/{id}/update', 'MaintenanceController@update');
    Route::get('/maintenance/{group}/{assetId}/{id}/detail', 'MaintenanceController@detail');
    Route::get('/maintenance/{group}/{assetId}/{id}/delete', 'MaintenanceController@destroy');

    Route::get('/bill/{group}/{assetId}/add', 'BillController@create');
    Route::post('/bill/{group}/{assetId}/save', 'BillController@store');
    Route::get('/bill/{group}/{assetId}/{id}/edit', 'BillController@edit');
    Route::post('/bill/{group}/{assetId}/{id}/update', 'BillController@update');
    Route::get('/bill/{group}/{assetId}/{id}/detail', 'BillController@detail');
    Route::get('/bill/{group}/{assetId}/{id}/delete', 'BillController@destroy');

});


Route::group(['middleware' => ['auth', 'site']], function () {
    Route::get( '/user-data', 'UserController@anyData')->name('user.data' );
    Route::get( '/permission-data', 'PermissionController@anyData')->name('permission.data' );
    Route::get( '/role-data', 'RoleController@anyData')->name('role.data' );
    Route::get( '/asset-data', 'AssetController@anyData')->name('asset.data' );
    Route::get( '/grouped-asset-data', 'AssetByGroupController@anyData')->name('grouped-asset.data' );
    Route::get( '/maintenance-data', 'MaintenanceController@anyData')->name('maintenance.data' );
    Route::get( '/bill-data', 'BillController@anyData')->name('bill.data' );
    Route::get( '/asset-location-data', 'AssetLocationController@anyData')->name('asset-location.data' );
    Route::get( '/asset-performance-data', 'AssetPerformanceController@anyData')->name('asset-performance.data' );
    Route::get( '/asset-type-data', 'AssetTypeController@anyData')->name('asset-type.data' );
    Route::get( '/asset-condition-data', 'AssetConditionController@anyData')->name('asset-condition.data' );
    Route::get( '/site-data', 'SiteController@anyData')->name('site.data' );
    Route::get( '/menu-data', 'MenuController@anyData')->name('menu.data' );
    Route::get('/asset/asset-type-form/{formId}', 'AssetByGroupController@assetTypeForm');
    Route::get('/asset/asset-type-edit-form/{assetId}/{formId}', 'AssetByGroupController@assetTypeEditForm');
    Route::post('/ajax/upload', 'AssetController@uploadImage');
});


