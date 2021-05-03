<?php

class Contact extends Controller {

    public function index() {
        $this->view('shared/header', ['title' => 'Domácí optika']);
        $this->view('static/contacts');
        $this->view('shared/footer');
    }
}