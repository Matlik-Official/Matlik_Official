<?php

    $data = $_POST['task'];

    $app['database']->insert(
        'tasks', 
        [
            'description'   =>  $data,
            'completed'     =>  '0'
        ],
        '/'
    );