<?php

class Prohlidka extends Controller {

    public function index($params = []) {
        if (!empty($_SESSION)) {
            $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
            if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor') {
                $patients = User::where('role', '=', 'patient')->get();
                $this->view('users/exam', ['patients' => $patients]);
            }
            else {
                $this->view('users/exam');
            }
            $this->view('shared/footer');
        }
        else {
            header("Location: /Ocni/okularium/public/");
        }
    }

    public function time($params = []) {
        $times = ['07:30:00', '08:30:00', '09:30:00'];

        if (!empty($_GET)) {
            $exams = Exam::where('date', '=', $_GET['date'])->get();

            if (count($exams) > 0) {
                foreach ($exams as $exam) {
                    if (($key = array_search($exam->time, $times)) !== false) {
                        unset($times[$key]);
                    }
                }
            }

            foreach ($times as $time) {
                echo $time . ';';
            }
            exit();
        }
    }

    public function add($params = []) {
        if (!empty($_GET)) {
            $exam = new Exam;

            $exam->date = $_GET['date'];
            $exam->time = $_GET['time'];
            $exam->id_user = $_GET['user'];
            $exam->reason = ((!empty($_GET['reason']))? $_GET['reason'] : '');

            $exam->save();

            header("Location: /Ocni/okularium/public/prohlidka/?add=1");
            exit();
        }
        else {
            header("Location: /Ocni/okularium/public/prohlidka/");
            exit();
        }
    }
}