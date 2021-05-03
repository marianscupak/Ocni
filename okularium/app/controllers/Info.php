<<<<<<< HEAD:okularium/app/controllers/Informace.php
<?php

class Informace extends Controller {
    
    public function index() {
        $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
        $this->view('static/info');
        $this->view('shared/footer');
    }
=======
<?php

class Info extends Controller {
    
    public function index() {
        $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
        $this->view('static/info');
        $this->view('shared/footer');
    }
>>>>>>> routes-update:okularium/app/controllers/Info.php
}