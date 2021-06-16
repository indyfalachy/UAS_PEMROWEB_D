<?php


class Register extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
//        $this->view('templates/header', $data);
        $this->view('register/index', $data);
//        $this->view('templates/footer');
    }
    public function tambah()
    {
        if( $this->model('Users')->TambahdataUsers($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . 'home');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }
}