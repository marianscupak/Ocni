<?php

class Home extends Controller {
    // Homepage controller.
    public function index() {
        $this->view('shared/header', ['title' => 'Domácí optika']);
        $this->view('home/index');
        $this->view('shared/footer');
    }
}
