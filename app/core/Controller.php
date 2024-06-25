<?php

class Controller {
    public function __construct() {
        session_start(); // Ensure the session is started
    }

    protected function view($view, $data = []) {
        extract($data);
        require_once '../app/views/' . $view . '.php';
    }

    protected function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    protected function checkLoggedIn()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /');
            exit();
        }
    }
}
