<?php

    if (!isset($_SESSION['email'])) {
        require("views/404.view.php");
        die();
    }

    $title = base64_encode($_POST['title']);
    $content = base64_encode(nl2br($_POST['content']));
    $figma = $_POST['figma'];
    $github = $_POST['github'];
    $image = $_FILES['file'];
    $project_page = $_POST['project_page'];
    $id = $_POST['id'];
    $update_img = 'off';

    if (isset($_POST['update_img'])) {
        $update_img = $_POST['update_img'];
    }

    if ($update_img != 'off') {
        $TXTtoDB = "";

        if (isset($_FILES['file'])) {
            $imgName = "";
            $countFiles = count(array_filter($_FILES['file']['name']));
            for ($i=0; $i < $countFiles; $i++) { 
     
                if ($i == $countFiles - 1) {
                    $fileName = $_FILES['file']['name'][$i];
                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt));
     
                    $allowed = array('jpg', 'jpeg', 'png', 'webp');
     
                    if (in_array($fileActualExt, $allowed)) {
                        $fileNameNew = uniqid('', true).".".$fileActualExt;
                        move_uploaded_file($_FILES['file']['tmp_name'][$i], 'public/images/projects/'.$fileNameNew);
         
                        $imgName .= $fileNameNew;
         
                    }  
                }
            }	
        };

        $app['database']->update(
            'projects',
            "title = '$title', content = '$content', figma = '$figma', github = '$github', image = '$fileNameNew', project_page = '$project_page'",
            $id,
            '/work'
        );
    } else {
        $app['database']->update(
            'projects',
            "title = '$title', content = '$content', figma = '$figma', github = '$github', project_page = '$project_page'",
            $id,
            '/work'
        );
    }