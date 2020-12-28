<?php

class Cenik extends Controller {
    // Homepage controller.
    public function index() {
        $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
        $this->view('static/pricelist');
        $this->view('shared/footer');
    }
}