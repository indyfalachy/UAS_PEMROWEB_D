<?php


class DetailTransaksi{
    private $table = 'DetailTransaksi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDetailTransaksi()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getDetailTransaksiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function TambahdataDetailTransaksi($data)
    {
        $query = "INSERT INTO DetailTransaksi
                    VALUES
                  ('', :id, :transaksi_id, :tipe_sampah_id, :berat)";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('transaksi_id', $data['transaksi_id']);
        $this->db->bind('tipe_sampah_id', $data['tipe_sampah_id']);
        $this->db->bind('berat', $data['berat']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function HapusdataDetailTransaksi($id)
    {
        $query = "DELETE FROM DetailTransaksi WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function UbahdataDetailTransaksi($data)
    {
        $query = "UPDATE DetailTransaksi SET
                    id = :id,
                    transaksi_id = :transaksi_id,
                    tipe_sampah_id = :tipe_sampah_id,
                    berat = :berat,
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('transaksi_id', $data['transaksi_id']);
        $this->db->bind('tipe_sampah_id', $data['tipe_sampah_id']);
        $this->db->bind('berat', $data['berat']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function CaridataDetailTransaksi()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM DetailTransaksi WHERE name LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

}