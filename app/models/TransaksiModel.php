<?php


class TransaksiModel{

    private $table = 'transaksi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTransaksi()
    {
        if ($_SESSION['role']==1) {
            $this->db->query('SELECT * FROM ' . $this->table . ' JOIN tipe_sampah on transaksi.tipe_sampah_id =tipe_sampah.id');
        }else{
            $this->db->query('SELECT * FROM ' . $this->table . ' JOIN tipe_sampah on transaksi.tipe_sampah_id =tipe_sampah.id WHERE user_id='.$_SESSION["id"]);
        }
        return $this->db->resultSet();
    }

    public function getTransaksiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function TambahdataTransaksi($data)
    {
        $query = "INSERT INTO $this->table
                    VALUES ('', :user_id, :tipe_sampah_id, :jumlah,:harga_total, :deskripsi)";
        $this->db->query($query);
        $this->db->bind('user_id', $_SESSION['id']);
        $this->db->bind('tipe_sampah_id', $data['tipe_sampah_id']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('harga_total', $data['harga_total']*$data['jumlah']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function HapusdataTransaksi($id)
    {
        $query = "DELETE FROM TransaksiModel WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function UbahdataTransaksi($data)
    {
        $query = "UPDATE mahasiswa SET
                    id = :id,
                    user_id= :user_id,
                    bank_sampah_id = :bank_sampah_id,
                    status = :status,
                    deskripsi = :deskripsi
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('bank_sampah_id', $data['bank_sampah_id']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('deskripsi', $data['deskripsi']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function CaridataTransaksi()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM TransaksiModel WHERE name LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
