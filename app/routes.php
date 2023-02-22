<?php


    $router->get('', 'PagesController@index');
    $router->get('work', 'PagesController@work');
    $router->get('contact', 'PagesController@contact');
    $router->get('404', 'PagesController@error');
    
    $router->get('login', 'UserController@login');
    $router->get('logout', 'UserController@logout');
    
    $router->get('project', 'ProjectController@index');
    $router->get('project/edit', 'ProjectController@edit');
    $router->get('project/add', 'ProjectController@add');
    $router->get('project/delete/confirm', 'ProjectController@deleteConfirm');
    
    
    $router->post('contact/post', 'PagesController@contactPost');
    
    $router->post('project/add/post', 'ProjectController@addPost');
    $router->post('project/edit/post', 'ProjectController@editPost');
    $router->post('project/delete', 'ProjectController@delete');
    
    $router->post('login/check', 'UserController@loginCheck');