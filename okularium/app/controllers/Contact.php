<?php

class Contact extends Controller {
    
    public function index() {
        $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
        $this->view('static/contacts');
        $this->view('shared/footer');
    }
}