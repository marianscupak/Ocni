<?php

class Admin extends Controller {

    public function index() {
        $this->view('shared/header', ['title' => 'Domácí optika']);
        $this->view('home/admin');
        $this->view('shared/footer');
    }

    public function add($params = []) {
        if (isset($_POST['submitAdd'])) {
            $files = $_FILES['files'];
            $file_count = count($files['name']);

            $glasses = new Glasses;

            $id = Glasses::max('id_glasses');

            $id = (!empty($id))? $id + 1 : 1;

            $glasses->id_glasses = $id;
            $glasses->name = $_POST['name'];
            $glasses->price = $_POST['price'];
            $glasses->gender = $_POST['gender'];
            $glasses->img_count = $file_count;

            $glasses->save();
            for ($i = 0; $i < $file_count; $i++) {
                move_uploaded_file($files['tmp_name'][$i], "images/glasses/glasses_" . $id . "_" . ($i + 1) . ".jpg");
            }
            header("Location: /Ocni/domaci-optika/public/admin?add=1");
        }
    }

    public function del($params = []) {
        if (empty($params) || !is_numeric($params[0])) {
            $this->index();
        }
        else {
            $id_glasses = $params[0];

            $glasses = Glasses::find($id_glasses);

            array_map('unlink', glob("images/glasses/glasses_" . $id_glasses . "_*"));

            $glasses->delete();

            header("Location: /Ocni/domaci-optika/public/admin?del=1");
        }
    }
}