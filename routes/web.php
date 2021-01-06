<?php

use Illuminate\Support\Facades\Route;



    


/**
 * Route Plans
 */
    Route::prefix('admin')
                ->namespace('Admin')
                ->middleware('auth')
                ->group(function() {

        /**
         * Plans x Profile
         */

         Route::get('plans/{id}/profile/{idProfile}/detach', 'ACL\PlanProfileController@detachProfilePlan')->name('plans.profile.detach');
         Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
         Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
         Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
         Route::get('Profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');

        /**
         * Permission x Profile
         */

         Route::get('profiles/{id}/premission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionsProfille')->name('profiles.permissions.detach');
         Route::post('profiles/{id}/premissions', 'ACL\PermissionProfileController@attachPermissionsProfille')->name('profiles.permissions.attach');
         Route::any('profiles/{id}/premissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
         Route::get('profiles/{id}/premissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
         Route::get('premissions/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');

        /**
         * Routes Profiles 
         */

         Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
         Route::resource('permissions', 'ACL\PermissionController');

        /**
         * Routes Profiles 
         */

         Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
         Route::resource('profiles', 'ACL\ProfileController');

        /**
         * Routes Details Plans
         */
        Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
        Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
        Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
        Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
        Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
        Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
        Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');


        Route::get('plans/create', 'PlanController@create')->name('plans.create');
        Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
        Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
        Route::any('plans/search', 'PlanController@search')->name('plans.search');
        Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
        Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
        Route::post('plans', 'PlanController@store')->name('plans.store');
        Route::get('plans', 'PlanController@index')->name('plans.index');

    /**
     * Home Dashboard
     */
    Route::get('/', 'PlanController@index')->name('admin.index');
});

/**
 * Site
 */
Route::get('/plan/{url}', 'Site\SiteController@plan')->name('plan.subscription');
Route::get('/', 'Site\SiteController@index')->name('site.home');

/**
 * Auth Routes
 */
Auth::routes();
