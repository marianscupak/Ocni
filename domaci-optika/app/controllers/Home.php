<?php

class Home extends Controller {

    public function index($name = '') {
        $glasses = $this->model('Glasses');
        $glasses->name = $name;
        
        $this->view('home/index', ['name' => $glasses->name]);
    }
}