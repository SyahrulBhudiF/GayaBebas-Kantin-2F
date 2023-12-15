<?php

class RequestBarangModel
{
    private $table = 'request';
    private $view = 'request_user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getRequestBarang()
    {
        $this->db->query("SELECT * FROM " . $this->view);
        return $this->db->resultSet();
    }

    public function acceptRequest($id)
    {
        $query = "UPDATE " . $this->table . " SET status = :status WHERE id_request = :id_request";
        $this->db->query($query);
        $this->db->bind('status', 'Disetujui');
        $this->db->bind('id_request', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function rejectRequest($id)
    {
        $query = "UPDATE " . $this->table . " SET status = :status WHERE id_request = :id_request";
        $this->db->query($query);
        $this->db->bind('status', 'Ditolak');
        $this->db->bind('id_request', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
