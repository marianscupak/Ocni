<?php

class Domu extends Controller {
    // Homepage controller.
    public function index() {
        $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
        $this->view('home/index');
        $this->view('shared/footer');
    }
}