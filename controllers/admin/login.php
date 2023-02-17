<?php
    // $id = $_GET['id'];

    $project = $app['database']->selectAll('users');

    require_once('views/login.view.php');