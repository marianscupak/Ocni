<?php

require_once './app/config/init.php';

$router = new \Bramus\Router\Router();

$router->get('/', function() {
    require_once('./app/controllers/Home.php');
    
    $home = new Home();

    $home->index();
});

$router->get('/informace', function() {
    require_once('./app/controllers/Info.php');
    
    $info = new Info();

    $info->index();
});

$router->mount('/cenik', function() use ($router) {
    $router->get('/', function() {
        require_once('./app/controllers/Prices.php');
    
        $prices = new Prices();

        $prices->index();
    });

    $router->get('/upravit', function() {
        require_once('./app/controllers/Prices.php');
    
        $prices = new Prices();

        $prices->edit();
    });

    $router->post('/update', function() {
        require_once('./app/controllers/Prices.php');
    
        $prices = new Prices();

        $prices->update();
    });

});

$router->get('/kontakty', function() {
    require_once('./app/controllers/Contact.php');

    $contact = new Contact();

    $contact->index();
});

$router->mount('/uzivatel', function() use ($router) {
    $router->get('/', function() {
        require_once('./app/controllers/UserController.php');

        $user = new UserController();

        $user->index();
    });

    $router->post('/login', function() {
        require_once('./app/controllers/UserController.php');

        $user = new UserController();

        $user->login();
    });

    $router->get('/logout', function() {
        require_once('./app/controllers/UserController.php');

        $user = new UserController();

        $user->logout();
    });

    $router->post('/add', function() {
        require_once('./app/controllers/UserController.php');

        $user = new UserController();

        $user->add();
    });

    $router->post('/update', function() {
        require_once('./app/controllers/UserController.php');

        $user = new UserController();

        $user->update();
    });

    $router->get('/delete/{id}', function($id) {
        require_once('./app/controllers/UserController.php');

        $user = new UserController();

        $user->delete($id);
    });

    $router->get('/{email}', function($email) {
        require_once('./app/controllers/UserController.php');

        $user = new UserController();

        $user->index($email);
    });
});

$router->mount('/pacienti', function() use ($router) {
    $router->get('/', function() {
        require_once('./app/controllers/Patients.php');

        $patients = new Patients();

        $patients->index();
    });

    $router->get('/pridat', function() {
        require_once('./app/controllers/Patients.php');

        $patients = new Patients();

        $patients->add();
    });
});

$router->mount('/prohlidky', function() use ($router) {
    $router->get('/', function() {
        require_once('./app/controllers/Exams.php');

        $exams = new Exams();

        $exams->index();
    });

    $router->get('/pridat', function() {
        require_once('./app/controllers/Exams.php');

        $exams = new Exams();

        $exams->add_view();
    });

    $router->get('/add', function() {
        require_once('./app/controllers/Exams.php');

        $exams = new Exams();

        $exams->add();
    });

    $router->get('/delete', function() {
        require_once('./app/controllers/Exams.php');

        $exams = new Exams();

        $exams->delete();
    });
});

$router->mount('/ordinacni_hodiny', function() use ($router) {
    $router->get('/', function() {
        require_once('./app/controllers/OfficeHours.php');

        $officeHours = new OfficeHours();

        $officeHours->index();
    });

    $router->post('/update', function() {
        require_once('./app/controllers/OfficeHours.php');

        $officeHours = new OfficeHours();

        $officeHours->update();
    });

    $router->get('/times', function() {
        require_once('./app/controllers/OfficeHours.php');

        $officeHours = new OfficeHours();

        $officeHours->times();
    });

    $router->get('/days', function() {
        require_once('./app/controllers/OfficeHours.php');

        $officeHours = new OfficeHours();

        $officeHours->days();
    });
});

$router->run();