<?php

    $email = $_REQUEST['email'];
    $password = md5($_REQUEST['password']);

    $database = $app['database']->selectAll(
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
                require("views/404.view.php");
            }
        } else {
            require("views/404.view.php");
        }
    endforeach;