<?php 

class Transaksi extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        $data['transaksi'] = $this->model('TransaksiModel')->getAllTransaksi();
        $this->view('templates/header', $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footer');
    }
    public function create()
    {
        $data['judul'] = 'Home';
//        $data=$this->model('TipeSampahModel')->getTipeSampahById();
//        $data=$data['harga'];
//        var_dump($data);
        $data['tp'] = $this->model('TipeSampahModel')->getAllTipeSampah();
        $this->view('templates/header', $data);
        $this->view('transaksi/create', $data);
        $this->view('templates/footer');
    }
    public function tambah()
    {
        $data=$this->model('TipeSampahModel')->getTipeSampahById($_POST['tipe_sampah_id']);
        $data=$data['harga'];
        $_POST['harga_total']=$data;
        if ($this->model('TransaksiModel')->TambahdataTransaksi($_POST) > 0) {
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