<?php

class UserModel
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser($username, $password)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE username = :username AND password = :password AND status = 'Aktif'");
        $this->db->bind("username", $username);
        $this->db->bind("password", $password);
        return $this->db->single();
    }

    public function getUserByName($name)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama = :nama");
        $this->db->bind("nama", $name);
        return $this->db->single();
    }

    public function getKaryawan()
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE level = 'Operator' AND status = 'Aktif'");
        return $this->db->resultSet();
    }

    public function addKaryawan($data, $password)
    {
        $query = "INSERT INTO " . $this->table . " VALUES ('', :nama, :no_telp, :tgl_bergabung, :username, :password, :level, :status)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('no_telp', $data['noTelp']);
        $this->db->bind('tgl_bergabung', date('Y-m-d'));
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $password);
        $this->db->bind('level', 'Operator');
        $this->db->bind('status', 'Aktif');

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function editKaryawan($id, $data, $password)
    {
        $query = "UPDATE " . $this->table . " SET nama = :nama, no_telp = :no_telp, username = :username, password = :password WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('no_telp', $data['noTelp']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $password);
        $this->db->bind('id_user', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteKaryawan($id)
    {
        $query = "UPDATE " . $this->table . " SET status = :status WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind('status', 'Non-Aktif');
        $this->db->bind('id_user', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
