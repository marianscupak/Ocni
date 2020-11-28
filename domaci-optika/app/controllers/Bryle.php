<?php

class Bryle extends Controller {

    public function index($params = []) {
        $gender = '';
        $page = 1;

        if (isset($params[0])) {
            if (is_numeric($params[0])) {
                $page = $params[0];
            }
            else {
                $gender = $params[0];
            }
        }

        if (isset($params[1])) {
            if (is_numeric($params[1])) {
                $page = $params[1];
            }
        }

        $filters = $_GET;

        $glasses = Glasses::select('*');

        if (!empty($gender)) {
            $glasses = $glasses->where('gender', $gender);
        }
        if (!empty($_GET['priceFrom'])) {
            $glasses = $glasses->where('price', '>=', $_GET['priceFrom']);
        }
        if (!empty($_GET['priceTo'])) {
            $glasses = $glasses->where('price', '<=', $_GET['priceTo']);
        }
        if (!empty($_GET['order'])) {
            if ($_GET['order'] == 'priceAsc') {
                $glasses = $glasses->orderBy('price', 'asc');
            }
            else if ($_GET['order'] == 'priceDesc') {
                $glasses = $glasses->orderBy('price', 'desc');
            }
            else if ($_GET['order'] == 'dateAsc') {
                $glasses = $glasses->orderBy('date', 'asc');
            }
            else if ($_GET['order'] == 'dateDesc') {
                $glasses = $glasses->orderBy('date', 'desc');
            }
        }

        $count = $glasses->count();

        $glasses = $glasses->skip(($page - 1) * Glasses::$page_count)->take(Glasses::$page_count);
        
        $glasses = $glasses->get();

        $data['glasses'] = $glasses;
        $data['count'] = $count;
        $data['limits'] = Glasses::get_limits();
        $data['per_page'] = Glasses::$page_count;
        $data['page'] = $page;
        $data['gender'] = $gender;

        $this->view("shared/header", ['title' => 'Domácí optika']);
        $this->view("glasses/all_glasses", $data);
        $this->view("shared/footer");
    }
}