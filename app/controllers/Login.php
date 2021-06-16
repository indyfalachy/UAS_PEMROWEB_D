<?php

class Login extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
//        $this->view('templates/header', $data);
        $this->view('login/index', $data);
//        $this->view('templates/footer');
    }
    public function login()
    {
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('Users')->login($_POST['email'],$_POST['password']);
//        $this->view('templates/header', $data);
        $this->view('login/index', $data);
//        $this->view('templates/footer');
    }
    public function logout(){
//        session_start() ;
        session_destroy() ;
        $_SESSION = [];
        header('Location: ' . BASEURL . 'login');
    }
}