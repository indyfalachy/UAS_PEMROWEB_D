<?php


class LihatSampah extends controller {
    public function index()
    {
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('lihatsampah/lihatsampah', $data);
        $this->view('templates/footer');
    }
}