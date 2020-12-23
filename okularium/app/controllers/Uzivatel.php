<?php

class Uzivatel extends Controller {

    public function index($params = []) {
        if (!empty($_SESSION)) {
            $user;
            if (empty($params)) {
                $id = $_SESSION['id_user'];

                $user = User::find($id);
            }
            else if (($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor') || $_SESSION['email'] == ((gettype($params) == 'array')? $params[0] : $params)) {
                $email = (gettype($params) == 'array')? $params[0] : $params;

                $user = User::where('email', '=', $email)->first();
            }
            else {
                header("Location: /Ocni/okularium/public/uzivatel/");
                exit();
            }

            if (!empty($user)) {
                $exams = [
                    'past' => $user->exams()->where('date', '<', date('Y-m-d'))->orderBy('date', 'ASC')->orderBy('time', 'ASC')->get(),
                    'future' => $user->exams()->where('date', '>=', date('Y-m-d'))->orderBy('date', 'ASC')->orderBy('time', 'ASC')->get()
                ];    
            }
            else {
                header("Location: /Ocni/okularium/public/uzivatel/");
                exit();
            }

            $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
            $this->view('users/profile', ['user' => $user, 'exams' => $exams]);
            $this->view('shared/footer');
        }
        else {
            header("Location: /Ocni/okularium/public/");
            exit();
        }
    }

    public function login($params = []) {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $user = User::where('email', '=', $_POST['login'])->first();

            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['logged'] = true;
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['surname'] = $user['surname'];

                header("Location: /Ocni/okularium/public/?login=1");
                exit();
            }
            else {
                header("Location: /Ocni/okularium/public/?login=0");
                exit();
            }
            
        }
        else {
            header("Location: /Ocni/okularium/public/");
            exit();
        }
    }
    
    public function logout() {
        $_SESSION = [];
        
        session_destroy();

        header("Location: /Ocni/okularium/public/?logout=1");
        exit();
    }

    public function update() {
        if (!empty($_POST)) {
            $email = $_POST['original'];
            if (!empty($_POST['email'])) {
                $emailUp;
                $user = User::where('email', '=', $_POST['original'])->first();

                if (count(User::where('email', '=', $_POST['email'])->get()) == 0) {
                    $user->email = $_POST['email'];
                    $user->save();
                    $emailUp = true;
                    $email = $_POST['email'];
                    if ($_POST['original'] == $_SESSION['email']) {
                        $_SESSION['email'] = $_POST['email'];
                    }
                }
                else {
                    $emailUp = false;
                }
                
            }

            if (!empty($_POST['pwd_o'] && !empty($_POST['pwd_n']))) {
                $user = User::where('email', '=', $email)->first();

                if (password_verify($_POST['pwd_o'], $user['password'])) {
                    $user->password = password_hash($_POST['pwd_n'], PASSWORD_DEFAULT);
                    $user->save();

                    header("Location: /Ocni/okularium/public/uzivatel/" . $email . "?pwd=1");
                    exit();
                }
                else {
                    header("Location: /Ocni/okularium/public/uzivatel/" . $email . "?pwd=-1");
                    exit();
                }
            }
            else if ((!empty($_POST['pwd_o']) && empty($_POST['pwd_n'])) || (empty($_POST['pwd_o']) && !empty($_POST['pwd_n']))) {
                header("Location: /Ocni/okularium/public/uzivatel/" . $email . "?pwd=0");
                exit();
            }

            header("Location: /Ocni/okularium/public/uzivatel/" . $email . "/?update=" . (($emailUp)? 1 : 0));
            exit();
            
        }
        else {
            header("Location: /Ocni/okularium/public/uzivatel/");
            exit();
        }
    }

    public function delete($params = []) {
        if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor') {
            if (is_numeric($params[0])) {
                User::destroy($params[0]);
                header("Location: /Ocni/okularium/public/uzivatel?del=1");
                exit();
            }
            else {
                header("Location: /Ocni/okularium/public/uzivatel");
                exit();
            }
        }
        else {
            header("Location: /Ocni/okularium/public/uzivatel");
            exit();
        }
    }
}