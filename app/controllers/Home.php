<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home';
        if ($_SESSION['role'] == 1) {
            $data['user'] = $this->model('Users')->getAllUsers();
            $data['transaksi'] = $this->model('TransaksiModel')->getAllTransaksi();
            $saldo_nasabah = 0;
            $kapasitas_nasabah = 0;

            foreach ($data['user'] as $user) {
                $saldo_nasabah += $user['saldo'];
            }
            foreach ($data['transaksi'] as $transaksi) {
                $kapasitas_nasabah += $transaksi['jumlah'];
            }
            $kapasitas_nasabah /= 1000;
            $data['kapasitas_nasabah'] = $kapasitas_nasabah;
            $data['jumlah_nasabah'] = count($data['user']);
            $data['saldo_nasabah'] = $saldo_nasabah;

            $this->view('templates/header', $data);
            $this->view('home/index_admin', $data);
            $this->view('templates/footer');
        } else {
            $data['user'] = $this->model('Users')->getUsersById($_SESSION['id']);
            $this->view('templates/header', $data);
            $this->view('home/index_nasabah', $data);
            $this->view('templates/footer');
        }
    }
}