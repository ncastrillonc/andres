<?php

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('/test', function()
{
	return View::make();
});

Route::controller('personal','PersonalController');
Route::controller('clase','Clase2Controller');