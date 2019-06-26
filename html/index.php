<?php
include "loader.php";
//dd($_SERVER);
Route::get('/','\\Home\\Controller@index');

//Route::get('/category','\\Category\\Controller@index');
//Route::get('/category/create','\\Category\\Controller@create');
//Route::post('/category/store','\\Category\\Controller@store');
//Route::get('/category/{id}','\\Category\\Controller@show');
//Route::get('/category/{id}/edit','\\Category\\Controller@edit');
//Route::post('/category/{id}/update','\\Category\\Controller@update');
//Route::get('/category/{id}/delete','\\Category\\Controller@delete');

Route::resource('/category','\\Category\\Controller');
// start Country;
//Route::get('/country','\\Country\\Controller@index');// paso1
//Route::get('/country/create','\\Country\\Controller@create');//paso 2
//Route::post('/country/store','\\Country\\Controller@store');//paso 3
//Route::get('/country/{id}','\\Country\\Controller@show');//paso 4
//Route::get('/country/{id}/edit','\\Country\\Controller@edit');//paso 5
//Route::post('/country/{id}/update','\\Country\\Controller@update');//paso 6
//Route::get('/country/{id}/delete','\\Country\\Controller@delete'); //paso 7

Route::resource('/country','\\Country\\Controller');// esto contiene to podemos comentar los 7 porque aqui esta tdo

//// start Person;
Route::get('/person','\\Person\\Controller@index');//paso 1
Route::get('/person/create','\\Person\\Controller@create');//Paso 2
Route::post('/person/store','\\Person\\Controller@store');//paso 3
Route::get('/person/{id}','\\Person\\Controller@show');//paso 4
Route::get('/person/{id}/edit','\\Person\\Controller@edit'); //paso 5
Route::post('/person/{id}/update','\\Person\\Controller@update'); //paso 6
Route::get('/person/{id}/delete','\\Person\\Controller@delete'); //paso 7

//Route::resource('/person','\\Person\\Controller');



throw new Error("Route is not defined!");
