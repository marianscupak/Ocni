<?php

class Exams extends Controller {

    public function index() {
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
                header("Location: " . LINK_PREFIX . "/");
            }
        }
        else {
            header("Location: " . LINK_PREFIX . "/");
        }
    }

    public function add_view() {
        if (!empty($_SESSION)) {
            $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
            if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor') {
                $patients = User::where('role', '=', 'patient')->get();
                $this->view('admin/exam_add', ['patients' => $patients]);
            }
            else {
                $this->view('admin/exam_add');
            }
            $this->view('shared/footer');
        }
        else {
            header("Location: " . LINK_PREFIX . "/");
        }
    }

    public function add() {
        if (!empty($_GET)) {
            $exam = new Exam;

            $exam->date = $_GET['date'];
            $exam->time = $_GET['time'];
            $exam->id_user = $_GET['user'];
            $exam->reason = ((!empty($_GET['reason']))? $_GET['reason'] : '');

            if (count(Exam::where('date', '=', $exam->date)->where('time', '=', $exam->time)->get()) == 0) {
                $exam->save();

                $mailer = new Email;
                $mailer->send_email('sylva.smehlikova@gmail.com', 'Nová prohlídka', $this->viewToVar('emails/new_exam', ['exam' => $exam]));

                header("Location: " . LINK_PREFIX . "/prohlidky/pridat?add=1");
                exit();
            }
            else {
                header("Location: " . LINK_PREFIX . "/prohlidky/pridat?add=0");
                exit();
            }
        }
        else {
            header("Location: " . LINK_PREFIX . "/prohlidky");
            exit();
        }
    }

    public function delete() {
        if (!empty($_SESSION)) {
            if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor') {
                if (!empty($_GET)) {
                    $exam = Exam::where('date', '=', $_GET['date'])->where('time', '=', $_GET['time']);
                    $exam->delete();
                    
                    header("Location: " . LINK_PREFIX . "/prohlidky?del=1");
                    exit();
                }
                else {
                    header("Location: " . LINK_PREFIX . "/prohlidky");
                    exit();
                }
            }
            else {
                header("Location: " . LINK_PREFIX . "/prohlidky");
                exit();
            }
        }
        else {
            header("Location: " . LINK_PREFIX . "/prohlidky");
            exit();
        }
    }
}
