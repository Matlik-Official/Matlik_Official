<?php

    if (!isset($_SESSION['email'])) {
        require("views/404.view.php");
        die();
    }

    $id = $_GET['id'];

    $project = $app['database']->select('projects', $id);

    $title = $project->title;
    $content = $project->content;
    $figma = $project->figma;
    $github = $project->github;
    $project_page = $project->project_page;
    $image = $project->image;

    require_once('views/edit-project.view.php');