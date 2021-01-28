<?php

class Pacienti extends Controller {
    
    public function index($params = []) {
        if (!empty($_SESSION)) {
            if ($_SESSION['role'] == 'doctor' || $_SESSION['role'] == 'admin') {
                $patients = User::where('role', '=', 'patient')->get();

                $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
                $this->view('users/patients', ['patients' => $patients]);
                $this->view('shared/footer');
            }
            else {
                header("Location: /Ocni/okularium/public/");
                exit();
            }
        }
        else {
            header("Location: /Ocni/okularium/public/");
            exit();
        }
    }

    public function pridat($params = []) {
        if (!empty($_SESSION)) {
            if ($_SESSION['role'] == 'doctor' || $_SESSION['role'] == 'admin') {
                $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
                $this->view('admin/patient_add');
                $this->view('shared/footer');
            }
            else {
                header("Location: /Ocni/okularium/public/");
                exit();
            }
        }
        else {
            header("Location: /Ocni/okularium/public/");
            exit();
        }
    }
}
