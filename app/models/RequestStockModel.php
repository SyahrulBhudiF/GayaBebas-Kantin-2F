<?php

class RequestStockModel
{
    private $table = 'request_stok';
    private $view = 'user_request_stok';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getRequestStock()
    {
        $this->db->query("SELECT * FROM " . $this->view);
        return $this->db->resultSet();
    }

    public function getCountRequestStock()
    {
        $this->db->query("SELECT COUNT(status) FROM " . $this->view . " WHERE status = 'Sedang Diproses'");
        return $this->db->single();
    }

    public function acceptRequest($id)
    {
        $query = "UPDATE " . $this->table . " SET status = :status WHERE id_request_stok = :id_request_stok";
        $this->db->query($query);
        $this->db->bind('status', 'Disetujui');
        $this->db->bind('id_request_stok', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function rejectRequest($id)
    {
        $query = "UPDATE " . $this->table . " SET status = :status WHERE id_request_stok = :id_request_stok";
        $this->db->query($query);
        $this->db->bind('status', 'Ditolak');
        $this->db->bind('id_request_stok', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Operator
    public function addRequestStock($id, $data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :id_barang, :stok, :status)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('status', 'Sedang Diproses');

        $this->db->execute();

        return $this->db->rowCount();
    }
}
