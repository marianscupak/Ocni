<?php

class Email extends Controller {

    public function index($params = []) {
        if (isset($_POST['submit'])) {
            $glasses = Glasses::find($_POST['id']);
    
            $to = "scupak.m@seznam.cz";
            $subject = "Domácí optika - Zájem o " . $glasses->name;
    
            $headers = "From: info@domaci-optika.cz\r\n";
            $headers .= "Reply-To: info@domaci-optika.cz\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
            $message = '<html><body>';
            $message .= '<h1>Zájem o ' . $glasses->name . '</h1>';
            $message .= '<h2>Údaje zájemce:</h2>';
            $message .= '<h3>Jméno: ' . $_POST['name'] . ' ' . $_POST['surname'] . '</h3>';
            $message .= '<h3>E-mail: ' . $_POST['email'] . '</h3>';
            $message .= '<h3>Telefon: ' . $_POST['phone'] . '</h3>';
            $message .= '<h3>Adresa: ' . $_POST['street'] . ', ' . $_POST['city'] . ', ' . $_POST['psc'] . '</h3>';
            if (isset($_POST['msg'])) {
                $message .= '<h3>Zpráva zájemce:</h3>';
                $message .= '<p>' . $_POST['msg'] . '</p>';
            }
            $message .= '</body></html>';
    
            mail($to, $subject, $message, $headers);        
    
            header("Location: /Ocni/domaci-optika/public/bryle/detail/" . $glasses->id_glasses . "?mail=1");
        }
        else {
            header("Location: glasses.php");
        }
    }
}
    