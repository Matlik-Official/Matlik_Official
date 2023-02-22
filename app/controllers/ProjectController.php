<?php

namespace App\Controllers;

use App\Core\App;

class ProjectController {

    public function add () {

        return view('work-add');        

    }

    public function addPost () {
    
        $title = base64_encode($_POST['title']);
        $content = base64_encode(nl2br($_POST['content']));
        $figma = $_POST['figma'];
        $github = $_POST['github'];
        $image = $_FILES['file'];
        $project_page = $_POST['project_page'];
    
    
    
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
    
        App::get('database')->insert(
            'projects', 
            [
                'title' => $title,
                'content' => $content,
                'figma' => $figma,
                'github' => $github,
                'project_page' => $project_page,
                'image' => $fileNameNew
            ],
            '/work'
        );    
        
        header("Location: /work");

    }

    public function edit () {
        $id = $_GET['id'];

        $projects = App::get('database')->select('projects', $id);

        return view('edit-project', ['project' => $projects]);

    }

    public function editPost () {
        $title = base64_encode($_POST['title']);
        $content = base64_encode(nl2br($_POST['content']));
        $figma = $_POST['figma'];
        $github = $_POST['github'];
        $image = $_FILES['file'];
        $project_page = $_POST['project_page'];
        $id = $_POST['id'];
        $featured = 'off';
        $update_img = 'off';

        if (isset($_POST['featured'])) {
            $featured = $_POST['featured'];
        }
        
        
        if ($featured == 'on') {
            $featured = 1;
        } else {
            $featured = 0;
        }

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

            App::get('database')->update(
                'projects',
                "title = '$title', content = '$content', figma = '$figma', github = '$github', image = '$fileNameNew', project_page = '$project_page', featured = '$featured'",
                $id,
                '/work'
            );
        } else {
            App::get('database')->update(
                'projects',
                "title = '$title', content = '$content', figma = '$figma', github = '$github', project_page = '$project_page', featured = '$featured'",
                $id,
                '/work'
            );
        }

    }

    public function index () {

        $id = $_GET['id'];

        $projects = App::get('database')->select('projects', $id);

        return view('project', ['project' => $projects]);
        
    }

    public function deleteConfirm () {
        $id = $_GET['id'];

        $projects = App::get('database')->select('projects', $id);

        return view('deleteConfirm', ['project' => $projects]);
    }

    public function delete () {
        $id = $_POST['id'];

        $projects = App::get('database')->delete('projects', $id, '/work');
    }

}