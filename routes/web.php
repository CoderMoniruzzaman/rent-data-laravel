<?php

Route::get('/', 'FrontendController@index');
Route::get('about', 'FrontendController@about');
Route::get('product/home', 'ProductController@producthome');

Auth::routes();

//product routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add/product/landlordview/{product_id}', 'ProductController@addproductlandlordview');
Route::post('add/product/insert', 'ProductController@addproductinsert');
Route::get('product/view/data/{product_id}', 'ProductController@productviewdata');
Route::get('product/edit/data/{product_id}', 'ProductController@producteditdata');
Route::post('edit/product/insert', 'ProductController@editproductinsert');
Route::get('product/delete/data/{product_id}', 'ProductController@productdeletedata');

// Add house routes
Route::get('add/house/view/{product_id}', 'AddhouseController@addhouseview');
Route::post('add/house/insert', 'AddhouseController@addhouseinsert');
Route::get('house/view/data/{product_id}', 'AddhouseController@houseviewdata');
Route::get('addhouse/edit/data/{addhouse_id}', 'AddhouseController@addhouseeditdata');
Route::post('edit/addhouse/product/insert', 'AddhouseController@editaddhouseproductinsert');
Route::get('addhouse/delete/data/{addhouse_id}', 'AddhouseController@addhousedeletedata');

// Tenant routes

Route::get('add/tenant/view/{product_id}', 'AddtenantController@addtenantview');
Route::post('add/tenant/insert', 'AddtenantController@addtenantinsert');
Route::get('tenant/view/data/{product_id}', 'AddtenantController@tenantviewdata');
Route::get('tenant/view/data/single/{tenant_id}', 'AddtenantController@tenantviewdatasingle');
Route::get('tenant/edit/data/{tenant_id}', 'AddtenantController@tenanteditdata');
Route::post('edit/tenant/product/insert', 'AddtenantController@edittenantproductinsert');
Route::get('tenant/delete/data/{tenant_id}', 'AddtenantController@tenantdeletedata');

//Admin routes
Route::get('admin/tenant/view/data', 'AdmintenantController@admintenantviewdata');
Route::post('get/search/data', 'AdmintenantController@getsearchdata');
