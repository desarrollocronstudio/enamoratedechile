<?php

Route::get('/',
    ['as' => 'panel.stats.index', 'uses' => 'App\Stats\Controllers\StatController@index']);
Route::get('/report',
    ['as' => 'panel.stats.generate_report', 'uses' => 'App\Stats\Controllers\StatController@generate']);