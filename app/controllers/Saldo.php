<?php

class Saldo extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        $data['users'] = $this->model('Users')->getAllUsers();
        $this->view('templates/header', $data);
        $this->view('saldo/index', $data);
        $this->view('templates/footer');
    }
}