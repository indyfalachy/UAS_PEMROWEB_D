<?php


class TipeSampahModel {
    private $table = 'tipe_sampah';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTipeSampah()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getTipeSampahById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function TambahdataTipeSampah($data)
    {
        $query = "INSERT INTO tipe_sampah
                    VALUES
                  ('', :name, :harga)";

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('harga', $data['harga']);


        $this->db->execute();

        return $this->db->rowCount();
    }

    public function HapusdataTipeSampah($id)
    {
        $query = "DELETE FROM tipe_sampah WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function UbahdataTipeSampah($data)
    {
        $query = "UPDATE tipe_sampah SET
                    id = :id,
                    name = :nama,
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function CaridataTipeSampah()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM tipe_sampah WHERE name LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }


}