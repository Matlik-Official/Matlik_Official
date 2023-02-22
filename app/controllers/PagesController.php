<?php

namespace App\Controllers;

use App\Core\App;

class PagesController {

    public function index () {

        $featured = App::get('database')->selectAllWhere('projects', "featured = 1");

        return view('index', ['featured' => $featured]);        

    }

    public function work () {

        $works = App::get('database')->selectAll('projects');

        return view('work', ['works' => $works]);

    }

    public function contact () {

        return view('contact');

    }

    public function contactPost () {

        
        $to = $_REQUEST['email'] . ', matlikkarl@gmail.com';
        $user = $_REQUEST['first_name'];
        $mail_content = $_REQUEST['content'];
        $subject = "Letter to Matlik_Official";
        
        $message = "
        Tere, $user,
        <br><br>
        Tänan Teid kirjutamast. Vastan niipea kui võimalik.
        <br><br>
        Teie kiri:
        <br>
        $mail_content
        <br><br>
        ----------------------------------------------
        <br><br>
        Hi, $user,
        <br><br>
        Thnk You for cantacting me. I will answer as soon as possible.
        <br><br>
        Your Letter:
        <br>
        $mail_content
        ";
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <matlik@mannicoon.com>' . "\r\n";
        
        mail($to,$subject,$message,$headers);
        
        App::get('database')->insert(
            'contacts', 
            [
                'first_name'    =>  $_REQUEST['first_name'],
                'last_name'     =>  $_REQUEST['last_name'],
                'email'         =>  $_REQUEST['email'],
                'content'       =>  $_REQUEST['content']
            ],
            '/contact'
        );

        header("Location: /contact?sent");
    }

    public function error () {

        return view('404');

    }

}