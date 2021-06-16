<?php


class TipeSampah extends controller
{
    public function index()
    {
        $data['judul'] = 'Home';
        $data['tipesampah'] = $this->model('TipeSampahModel')->getAllTipeSampah();
        $this->view('templates/header', $data);
        $this->view('tipesampah/index', $data);
        $this->view('templates/footer');
    }

    public function create(){
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('tipesampah/create', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('TipeSampahModel')->TambahdataTipeSampah($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/tipesampah');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/tipesampah');
            exit;
        }
    }
}