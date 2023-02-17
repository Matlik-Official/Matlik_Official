<?php
    $id = $_GET['id'];

    $project = $app['database']->select('projects', $id);

    require_once('views/project.view.php');