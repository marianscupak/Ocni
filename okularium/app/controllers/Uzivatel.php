<?php

class Uzivatel extends Controller {

    public function index($params = []) {
        if (!empty($_SESSION)) {
            if (empty($params)) {
                $id = $_SESSION['id_user'];

                $user = User::find($id);

                $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
                $this->view('users/profile', ['user' => $user]);
                $this->view('shared/footer');
            }
            else if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor') {
                $email = (gettype($params) == 'array')? $params[0] : $params;

                $user = User::where('email', '=', $email)->first();

                if (!empty($user)) {
                    $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
                    $this->view('users/patient_profile', ['user' => $user]);
                    $this->view('shared/footer');
                }
                else {
                    header("Location: /Ocni/okularium/public/uzivatel/");
                    exit();
                }
            }
            else {
                header("Location: /Ocni/okularium/public/uzivatel/");
                exit();
            }
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
            if (!empty($_POST['email'])) {
                $user = User::where('email', '=', $_POST['original'])->first();

                $user->email = $_POST['email'];
                $user->save();
            }

            if (!empty($_POST['pwd_o'] && !empty($_POST['pwd_n']))) {
                $user = User::where('email', '=', $_POST['original'])->first();

                if (password_verify($_POST['pwd_o'], $user['password'])) {
                    $user->password = password_hash($_POST['pwd_n'], PASSWORD_DEFAULT);
                    $user->save();
                }
                else {
                    header("Location: /Ocni/okularium/public/uzivatel/?pwd=-1");
                    exit();
                }
            }
            else if ((!empty($_POST['pwd_o']) && empty($_POST['pwd_n'])) || (empty($_POST['pwd_o']) && !empty($_POST['pwd_n']))) {
                header("Location: /Ocni/okularium/public/uzivatel/?pwd=0");
                exit();
            }
            header("Location: /Ocni/okularium/public/uzivatel/?update=1");
        }
        else {
            header("Location: /Ocni/okularium/public/uzivatel/");
            exit();
        }
    }
}