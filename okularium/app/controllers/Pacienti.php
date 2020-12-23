<?php

class Pacienti extends Controller {

    public function index($params = []) {
        if (!empty($_SESSION)) {
            $patients = User::where('role', '=', 'patient')->get();

            $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
            $this->view('users/patients', ['patients' => $patients]);
            $this->view('shared/footer');
        }
    }
}