<<<<<<< HEAD:okularium/app/controllers/Domu.php
<?php

class Domu extends Controller {
    // Homepage controller.
    public function index() {
        $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
        $this->view('home/index');
        $this->view('shared/footer');
    }
=======
<?php

class Home extends Controller {
    // Homepage controller.
    public function index() {
        $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
        $this->view('home/index');
        $this->view('shared/footer');
    }
>>>>>>> routes-update:okularium/app/controllers/Home.php
}