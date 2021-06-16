<?php


class Users
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUsers()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getUsersById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email=:email ');
        $this->db->bind('email', $email);
        $status = $this->db->single();
        if ($status) {
            if ($status['password'] == $password) {
                session_start();
                $_SESSION["id"] = $status['id'];
                $_SESSION["name"] = $status['name'];
                $_SESSION["email"] = $email;
                $_SESSION["role"] = $status['role'];;
                header('Location: ' . BASEURL . 'dashboard');
            }
        }
        header('Location: ' . BASEURL . 'login');

    }

    public function TambahdataUsers($data)
    {
        $query = "INSERT INTO Users 
                    VALUES
                  ('', :password, :address,2, :email,'', :name )";

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('address', $data['address']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('email', $data['email']);
        $this->db->execute();
        session_start();
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email=:email ');
        $this->db->bind('email', $data['email']);
        $status = $this->db->single();
        $_SESSION["id"] = $status['id'];
        $_SESSION["name"] = $status['name'];
        $_SESSION["email"] = $data['email'];
        $_SESSION["role"] = $status['role'];;
        header('Location: ' . BASEURL . 'home');
        return $this->db->rowCount();
    }

    public function HapusdataUsers($id)
    {
        $query = "DELETE FROM Users WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function UbahdataUsers($data)
    {
        $query = "UPDATE Users SET
                    id = :id,
                    name = :name,
                    role = :role,
                    address = :address,
                    saldo = :saldo,
                    password = :password,
                    email = :email,
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('address', $data['address']);
        $this->db->bind('saldo', $data['saldo']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function CaridataUsers()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM Users WHERE name LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

}