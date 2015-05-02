<?php

class ProfileController extends BaseController {

  //cargar mi perfil
  public function getIndex() {

    $amigos = Usuario::all();
    $friends = "";
    foreach ($amigos as $amigo) {
      $friends.="\"{$amigo->nombre}\",";
    }
    $friends = trim($friends, ",");
    
    $publicaciones = Usuario::find(Auth::user()->id)->misPublicaciones();
    return View::make('perfil.perfil')
                    ->with("nombre", Auth::user()->nombre)
                    ->with("publicaciones", $publicaciones)
                    ->with("friends", $friends)
                    ->with("foto", Auth::user()->id.".jpg");
  }

  public function getVer($id) {
    if($id==Auth::user()->id) return Redirect::to("/profile");    
    $usuario = Usuario::find($id);
    if($usuario){
       $publicaciones = $usuario->misPublicaciones();
            return View::make('perfil.perfil')
                    ->with("nombre", $usuario->nombre)// 
                    ->with("publicaciones", $publicaciones)// 
                    ->with("foto", $usuario->id.".jpg");            
    }else{
      return Redirect::to("/profile");
    }
    
    
  }

  public function getLogout() {
    Auth::logout();
    return Redirect::to("/");
  }
  
  

}
