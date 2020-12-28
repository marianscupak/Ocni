<?php

class Ordinacni_hodiny extends Controller {
    // Homepage controller.
    public function index() {
        $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
        $this->view('office_hours');
        $this->view('shared/footer');
    }
}