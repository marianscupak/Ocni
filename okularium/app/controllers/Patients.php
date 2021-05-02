<?php

class Patients extends Controller {

    public function index() {
        if (!empty($_SESSION)) {
            if ($_SESSION['role'] == 'doctor' || $_SESSION['role'] == 'admin') {
                $patients = User::where('role', '=', 'patient')->get();

                $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
                $this->view('users/patients', ['patients' => $patients]);
                $this->view('shared/footer');
            }
            else {
                header("Location: " . LINK_PREFIX . "/");
                exit();
            }
        }
        else {
            header("Location: " . LINK_PREFIX . "/");
            exit();
        }
    }

    public function add() {
        if (!empty($_SESSION)) {
            if ($_SESSION['role'] == 'doctor' || $_SESSION['role'] == 'admin') {
                $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
                $this->view('admin/patient_add');
                $this->view('shared/footer');
            }
            else {
                header("Location: " . LINK_PREFIX . "/");
                exit();
            }
        }
        else {
            header("Location: " . LINK_PREFIX . "/");
            exit();
        }
    }
}
