<?php

class Uzivatel extends Controller {

    public function index() {
        if (!empty($_SESSION)) {
            $this->view('shared/header', ['title' => 'Oční klinika Okularium']);
            $this->view('home/index');
            $this->view('shared/footer');
        }
        else {
            header("Location: /Ocni/okularium/public/");
            exit();
        }
    }

    public function login($params = []) {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $user = User::where('login', '=', $_POST['login'])->first();

            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['logged'] = true;
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['login'] = $user['login'];
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
}