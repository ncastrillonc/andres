<?php

Route::get('/', function()
{ 
    if(Auth::check()){
      return Redirect::to("/profile");
    }
    return View::make('general.login');
	
});
Route::get('/profile', array('before'=>'auth', function()
{ 
  $publicaciones = Publicacion::orderBy('id','desc')->get();
	return View::make('perfil.perfil')
          ->with("nombre", Auth::user()->nombre)
          ->with("publicaciones", $publicaciones);
}));
Route::post('/loguear', function(){
    $email = Input::get('correo');
    $password = Input::get('password');
    if(Auth::attempt(['correo'=>$email, 'password'=> $password])){
     return Redirect::to("/profile");
    }else{
      echo "el usuario no está logueado";
    }
});
Route::get('/logout', function(){
  Auth::logout();
  return Redirect::to("/");
});


Route::controller('personal','PersonalController');
Route::controller('clase','Clase2Controller');
Route::controller('publicacion','PublicacionController');