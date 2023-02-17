<?php

    $router->get('', 'controllers/user/index.php');
    // $router->get('about', 'controllers/user/about.php');
    $router->get('contact', 'controllers/user/contact.php');
    $router->get('work', 'controllers/user/work.php');
    $router->get('project', 'controllers/user/project.php');

    $router->get('login', 'controllers/admin/login.php');
    $router->get('logout', 'controllers/admin/logout.php');
    $router->get('project/edit', 'controllers/admin/edit-project.php');
    $router->get('work/add', 'controllers/admin/work-add.php');

    $router->post('project/edit/post', 'controllers/admin/edit-project-post.php');
    $router->post('work/add/post', 'controllers/admin/work-add-post.php');
    $router->post('task', 'controllers/admin/add-task.php');
    $router->post('contact/post', 'controllers/admin/contact-post.php');
    $router->post('login/check', 'controllers/admin/login-check.php');
