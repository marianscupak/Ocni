<?php

class Prices extends Controller {

    public function index() {
        $this->view('shared/header', ['title' => 'Domácí optika']);
        $this->view('static/pricelist');
        $this->view('shared/footer');
    }
}
