<?php

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Route::group(['middleware' => ['auth.admin']],function()
{

    /************************************
     * Base
     * **********************************/

    Route::get('/',['as' => 'panel.dashboard','uses' => 'App\Panel\Controllers\DashboardController@index']);


    /************************************
     * TIPS
     * **********************************/
    Route::model('tips', 'Tip', function()
    {
        throw new NotFoundHttpException;
    });

    Route::resource('tips','App\Panel\Controllers\TipController');

    Route::get('tips/{tips}/activate',['as' => 'panel.tips.activate','uses' => 'App\Panel\Controllers\TipController@activate']);

    Route::get('tips/{tips}/deactivate',['as' => 'panel.tips.deactivate','uses' => 'App\Panel\Controllers\TipController@deactivate']);



    /************************************
     * ...
     * **********************************/
});

