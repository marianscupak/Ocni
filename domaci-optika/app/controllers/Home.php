<?php

class Home extends Controller {
    // Homepage controller.
    public function index($id = 1) {
        $glasses = Glasses::find($id);        
        $this->view('home/index', ['glasses' => $glasses]);
    }
}