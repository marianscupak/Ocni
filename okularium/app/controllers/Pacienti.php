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
                $this->view('users/patient_add');
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

    public function add($params = []) {
        if (!empty($_POST)) {
            $user = new User;

            $user->name = $_POST['name'];
            $user->surname = $_POST['surname'];
            $user->email = $_POST['email'];
            $user->role = $_POST['role'];
            $password = generate_pwd();  // todo: emails
            $user->password = password_hash($password, PASSWORD_DEFAULT);   //tzQt2j

            if (count(User::where("email", '=', $_POST['email'])->get()) == 0) {
                $user->save();

                $file = fopen("pwd_temp.txt", "a");
                fwrite($file, $user->email . " - " . $password . "\n");

                $mailer = new Email;
                $mailer->send_email($user['email'], 'Okularium účet', $this->viewToVar('emails/new_user', ['user' => $user, 'password' => $password]));

                header("Location: /Ocni/okularium/public/pacienti/pridat/?uadd=1");
                exit();
            }
            else {
                header("Location: /Ocni/okularium/public/pacienti/pridat/?uadd=0");
                exit();
            }
        }
        else {
            header("Location: /Ocni/okularium/public/pacienti/");
            exit();
        }
    }
}

function generate_pwd(
    int $length = 6,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}