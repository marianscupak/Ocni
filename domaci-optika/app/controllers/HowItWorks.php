<?php

class HowItWorks extends Controller {

    public function index() {
        $this->view('shared/header', ['title' => 'Domácí optika']);
        $this->view('static/how_it_works');
        $this->view('shared/footer');
    }
}
