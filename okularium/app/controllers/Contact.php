<<<<<<< HEAD:okularium/app/controllers/Kontakty.php
<?php

class Kontakty extends Controller {
    
    public function index() {
        $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
        $this->view('static/contacts');
        $this->view('shared/footer');
    }
=======
<?php

class Contact extends Controller {
    
    public function index() {
        $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
        $this->view('static/contacts');
        $this->view('shared/footer');
    }
>>>>>>> routes-update:okularium/app/controllers/Contact.php
}