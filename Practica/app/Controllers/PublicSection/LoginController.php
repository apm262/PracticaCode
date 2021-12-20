<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;
use App\Libraries\UtilLibrary;
use App\Models\UsersModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view("PublicSection/login");
        

    }

    public function verify(){
        try{
            $request = $this->request;
            $username= $request->getVar("username");
            $pass= $request->getVar("password");

            $util = new UtilLibrary();
            $user = new UsersModel();

            $user =  $user->findUsers($username);

            if($user != null){

                $password_hash= $user->password;

                if(password_verify($pass,$password_hash )){
                    $session= session();
                    $data=[
                        "id" =>$user->id,
                        "username"=>$user->username,
                        "mail"=>$user->email,
                        "password"=>$user->password,
                        "name"=>$user->name,
                        "surname"=>$user->surname,
                        "rol"=>$user->rol_id
                    ];

                    $session->set($data);
                    return $response =$util ->getResponse("ok", "Usuario encontrado correctamente", $user);

                }else{

                    return $response= $util->getResponse("KO",  "Password de usuariuo no coincide", $user);
                    
                }
            }else{
                return $response =$util ->getResponse("KO", "Usuario no encontrado", $username);
            }
        }catch(\Exception $e){
            return $response=$util->getResponse("KO","Se ha producido un error", $e->getMessage());
        }
        return ($response);

       
    }
}
