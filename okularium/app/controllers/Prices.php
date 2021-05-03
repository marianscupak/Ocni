<?php

class Prices extends Controller {

    public function index() {
        $this->view('shared/header', ['title' => 'Oční klinika Okularium']);

        $prices = Pricelist::orderBy('name', 'desc')->get();
        $this->view('static/pricelist', ['prices' => $prices]);
        $this->view('shared/footer');
    }

    public function edit() {
        if (!empty($_SESSION)) {
            if ($_SESSION['role'] == 'doctor' || $_SESSION['role'] == 'admin') {
                $this->view('shared/header', ['title' => 'Oční klinika Okularium']);

                $prices = Pricelist::all();
                $this->view('admin/pricelist_edit', ['prices' => $prices]);
                $this->view('shared/footer');
            }
            else {
                header("Location: " . LINK_PREFIX . "/cenik");
                exit();
            }
        }
        else {
            header("Location: " . LINK_PREFIX . "/cenik");
            exit();
        }
    }

    public function update() {
        if (!empty($_POST)) {
            for ($i = 0; $i < count($_POST['names']); $i++) {
                $price = Pricelist::where('name', '=', $_POST['names'][$i])->first();
                if ($price == null) {
                    $price = new Pricelist;
                }
                $price->name = $_POST['names'][$i];
                $price->price = $_POST['prices'][$i];
                $price->note = $_POST['notes'][$i];

                $price->save();
            }

            if (count($_POST['names']) < count($prices = Pricelist::all())) {
                foreach ($prices as $price) {
                    if (!in_array($price->name, $_POST['names'])) {
                        $price->delete();
                    }
                }
            }

            header("Location: " . LINK_PREFIX . "/cenik/upravit?prc=1");
            exit();
        }
        else {
            header("Location: " . LINK_PREFIX . "/cenik/upravit?prc=0");
            exit();
        }
    }
}