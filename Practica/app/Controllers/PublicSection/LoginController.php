<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;
use App\Libraries\UtilLibrary;
use App\Models\Roles;
use App\Models\UsersModel;
use Config\UserProfiles;

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
            $rol = new Roles();

            $user =  $user->findUsers($username);
            

            if($user != null){

                $password_hash= $user->password;

                if(password_verify($pass,$password_hash )){

                    $rol = $rol->findRolesId($user->rol_id);
                    $rol = $util->comprobarRol($rol->id);
                    $session= session();
                    $data=[
                        "id" =>$user->id,
                        "username"=>$user->username,
                        "mail"=>$user->email,
                        "password"=>$user->password,
                        "name"=>$user->name,
                        "surname"=>$user->surname,
                        "rol"=>$rol ? UserProfiles::ADMIN_ROLE : UserProfiles::APP_CLIENT_ROLE
                    ];

                    $session->set($data);
                    return $response =$util ->getResponse("OK", "Usuario encontrado correctamente", $data);

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
