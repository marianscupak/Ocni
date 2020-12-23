<?php

class Prohlidky extends Controller {

    public function index($params = []) {
        if (!empty($_SESSION)) {
            if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor') {
                $exams = [
                    'past' => Exam::where('date', '<', date('Y-m-d'))->orderBy('date', 'ASC')->orderBy('time', 'ASC')->get(),
                    'future' => Exam::where('date', '>=', date('Y-m-d'))->orderBy('date', 'ASC')->orderBy('time', 'ASC')->get()
                ];

                $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
                $this->view('users/exams', ['exams' => $exams]);
                $this->view('shared/footer');
            }
            else {
                header("Location: /Ocni/okularium/public/");
            }
        }
        else {
            header("Location: /Ocni/okularium/public/");
        }
    }
}