<?php

class Transparentni_ceny extends Controller {

    public function index() {
        $this->view('shared/header', ['title' => 'Domácí optika']);
        $this->view('static/prices');
        $this->view('shared/footer');
    }
}