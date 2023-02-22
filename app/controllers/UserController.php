<?php

namespace App\Controllers;

use App\Core\App;

class UserController {

    public function login () {

        return view('login');        

    }

    public function loginCheck () {
        session_start();
        
        $email = $_REQUEST['email'];
        $password = md5($_REQUEST['password']);

        $database = App::get('database')->selectAll(
            'users'
        );


        foreach ( $database as $data ):
            if ($data->email == $email) {
                if ($data->password == $password) {
                
                    $_SESSION['email'] = $email;
                    $_SESSION['first_name'] = $data->f_name;
                    $_SESSION['flast_name'] = $data->l_name;
                    header("Location: /");
                } else {
                    return view('404'); 
                }
            } else {
                return view('404'); 
            }
        endforeach;
    }

    public function logout () {
        session_start();
        // Destroy session
        if(session_destroy()) {
            // Redirecting To Home Page
            header("Location: /");
        }
    }

}