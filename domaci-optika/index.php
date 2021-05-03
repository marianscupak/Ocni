<?php

require_once './app/config/init.php';

$router = new \Bramus\Router\Router();

$router->get('/', function() {
    require_once('./app/controllers/Home.php');
    
    $home = new Home();

    $home->index();
});

$router->get('/cenik', function() {
    require_once('./app/controllers/Prices.php');
    
    $prices = new Prices();

    $prices->index();
});

$router->get('/transparentni_ceny', function() {
    require_once('./app/controllers/Transparent.php');

    $transparent = new Transparent();

    $transparent->index();
});

$router->mount('/bryle', function() use ($router) {
    $router->get('/', function() {
        require_once('./app/controllers/GlassesController.php');
    
        $glasses = new GlassesController();
    
        $glasses->index();
    });

    $router->get('/detail/{id}', function($id) {
        require_once('./app/controllers/GlassesController.php');
    
        $glasses = new GlassesController();

        $glasses->detail($id);
    });

    $router->get('/{page}', function($page) {
        require_once('./app/controllers/GlassesController.php');
    
        $glasses = new GlassesController();
    
        $glasses->index($page);
    });

    $router->get('/{gender}/{page}', function($gender, $page) {
        require_once('./app/controllers/GlassesController.php');
    
        $glasses = new GlassesController();
    
        $glasses->index($gender, $page);
    });
});

$router->get('/jak_to_funguje', function() {
    require_once('./app/controllers/HowItWorks.php');

    $howItWorks = new HowItWorks();

    $howItWorks->index();
});

$router->get('/kontakty', function() {
    require_once('./app/controllers/Contact.php');

    $contact = new Contact();

    $contact->index();
});

$router->mount('/admin', function() use ($router) {
    $router->get('/', function() {
        require_once('./app/controllers/Admin.php');
    
        $admin = new Admin();
    
        $admin->index();
    });

    $router->post('/add', function() {
        require_once('./app/controllers/Admin.php');
    
        $admin = new Admin();
    
        $admin->add();
    });

    $router->get('/del/{id}', function($id) {
        require_once('./app/controllers/Admin.php');
    
        $admin = new Admin();
    
        $admin->del($id);
    });
});

$router->run();