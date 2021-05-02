<?php

class OfficeHours extends Controller {
    
    public function index() {
        if (!empty($_SESSION) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor')) {
            $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
            $days = Times::get();
            $this->view('admin/office_hours', ['days' => $days]);
            $this->view('shared/footer');
        }
        else {
             header("Location: " . LINK_PREFIX . "/");
            exit();
        }
    }

    public function update() {
        if (!empty($_POST)) {
            if (!check_duplicates($_POST['days'])) {
                for ($i = 0; $i < count($_POST['days']); $i++) {
                    $day = Times::where('day', '=', $_POST['days'][$i])->first();
                    if ($day == null) {
                        $day = new Times;
                    }
                    $day->day = $_POST['days'][$i];
                    $day->time_from = $_POST['times_from'][$i];
                    $day->time_to = $_POST['times_to'][$i];

                    $day->save();
                }

                if (count($_POST['days']) < count($times = Times::all())) {
                    foreach ($times as $time) {
                        if (!in_array($time->day, $_POST['days'])) {
                            $time->delete();
                        }
                    }
                }

                 header("Location: " . LINK_PREFIX . "/ordinacni_hodiny?hrs=1");
                exit();
            }
            else {
                 header("Location: " . LINK_PREFIX . "/ordinacni_hodiny?hrs=0");
                exit();
            }
        }
    }

    public function times($params = []) {
        if (!empty($_GET)) {
            $day = DateTime::createFromFormat('Y-m-d', $_GET['date'])->format('N');
            $times = count_times(Times::where('day', '=', $day)->first());

            $exams = Exam::where('date', '=', $_GET['date'])->get();

            if (count($exams) > 0) {
                foreach ($exams as $exam) {
                    if (($key = array_search($exam->time, $times)) !== false) {
                        unset($times[$key]);
                    }
                }
            }

            foreach ($times as $time) {
                echo substr($time, 0, -3) . ';';
            }
            exit();
        }
        else {
             header("Location: " . LINK_PREFIX . "/");
            exit();
        }
    }

    public function days($params = []) {
        $days = Times::get();
        foreach ($days as $day) {
            echo $day->day . ';';
        }
    }
}

function check_duplicates($days) {
    return count($days) !== count(array_unique($days));
}


function count_times($times) {
    if ($times != null) {
        $time_from = DateTime::createFromFormat("H:i:s", $times->time_from);
        $time_to = DateTime::createFromFormat("H:i:s", $times->time_to);
        $times = [];
        $curr = $time_from;
    
        while ($curr <= $time_to) {
            $times[] = $curr->format("H:i:s");
            $curr->add(new DateInterval('PT30M'));
        }
        return $times;
    }
    else {
        return [];
    }
}
