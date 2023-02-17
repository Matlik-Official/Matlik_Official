<?php

    require_once('vendor/autoload.php');
    require_once('core/bootstrap.php');
    
    require_once Router::load('routes.php')
        ->direct(Request::uri(), Request::method());