<?php

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
    CRUD::resource('page', 'FlintWebmedia\FlintboardBase\app\Http\Controllers\PageCrudController');
    CRUD::resource('content', 'FlintWebmedia\FlintboardBase\Controllers\PageEntityCrudController');
});