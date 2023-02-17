<?php

    $works = $app['database']->selectAll('projects');

    require_once('views/work.view.php');