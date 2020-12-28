<?php

class Informace extends Controller {
    // Homepage controller.
    public function index() {
        $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
        $this->view('static/info');
        $this->view('shared/footer');
    }
}