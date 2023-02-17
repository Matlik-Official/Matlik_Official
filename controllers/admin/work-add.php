<?php

    if (!isset($_SESSION['email'])) {
        require("views/404.view.php");
        die();
    }

    $data = $_POST['task'];

    require_once('views/work-add.view.php');