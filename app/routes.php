<?php

Route::get('/', function()
{
  View::make("ejem´lo");
	return View::make('hello');
});
Route::get('/afpinedac', function()
{
	return View::make('perfil.perfil')
          ->with("nombre", "Andrés");
});

Route::controller('personal','PersonalController');
Route::controller('clase','Clase2Controller');