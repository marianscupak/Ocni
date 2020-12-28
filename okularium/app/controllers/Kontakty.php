<?php

class Kontakty extends Controller {
    // Homepage controller.
    public function index() {
        $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
        $this->view('static/contacts');
        $this->view('shared/footer');
    }
}