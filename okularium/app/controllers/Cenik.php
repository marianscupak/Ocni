<?php

class Cenik extends Controller {
    // Homepage controller.
    public function index() {
        $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
        $prices = Pricelist::all();
        $this->view('static/pricelist', ['prices' => $prices]);
        $this->view('shared/footer');
    }
}