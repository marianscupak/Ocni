<?php

class Controller {
    // Base class for controllers.
    protected function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = '') {
        require_once '../app/views/' . $view . '.php';
    }

    public function viewToVar($view, $data = '') {
        ob_start();
        require_once '../app/views/' . $view . '.php';
        return ob_get_clean();
    }
}