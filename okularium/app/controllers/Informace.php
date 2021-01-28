<?php

class Informace extends Controller {
    
    public function index() {
        $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
        $this->view('static/info');
        $this->view('shared/footer');
    }
}