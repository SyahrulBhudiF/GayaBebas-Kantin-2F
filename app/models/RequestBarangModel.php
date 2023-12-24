<?php

class RequestBarangModel
{
    private $table = 'request_barang';
    private $view = 'user_request_barang';
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

    public function getCountRequestBarang()
    {
        $this->db->query("SELECT COUNT(status) FROM " . $this->view . " WHERE status = 'Sedang Diproses'");
        return $this->db->single();
    }

    public function acceptRequest($id)
    {
        $query = "UPDATE " . $this->table . " SET status = :status WHERE id_request_barang = :id_request_barang";
        $this->db->query($query);
        $this->db->bind('status', 'Disetujui');
        $this->db->bind('id_request_barang', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function rejectRequest($id)
    {
        $query = "UPDATE " . $this->table . " SET status = :status WHERE id_request_barang = :id_request_barang";
        $this->db->query($query);
        $this->db->bind('status', 'Ditolak');
        $this->db->bind('id_request_barang', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Operator
    public function getRequestBarangAll()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getRequestBarangByOperatorName($name)
    {
        $this->db->query("SELECT * FROM " . $this->view . " WHERE nama_user = :nama_user");
        $this->db->bind('nama_user', $name);
        return $this->db->resultSet();
    }

    public function getRequestBarangById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_request_barang = :id_request_barang");
        $this->db->bind('id_request_barang', $id);
        return $this->db->single();
    }

    public function addRequestBarang($id, $data, $gambar)
    {
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :foto, :nama, :kategori, :stok, :hrg_jual, :tgl_expire, :status)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('foto', $gambar);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('hrg_jual', $data['harga']);
        $this->db->bind('tgl_expire', $data['date']);
        $this->db->bind('status', 'Sedang Diproses');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editRequestBarang($id, $data, $gambar)
    {
        $query = "UPDATE " . $this->table . " SET foto = :foto, nama = :nama, kategori = :kategori, stok = :stok, hrg_jual = :hrg_jual, tgl_expire = :tgl_expire WHERE id_request_barang = :id_request_barang";
        $this->db->query($query);
        $this->db->bind('foto', $gambar);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('hrg_jual', $data['harga']);
        $this->db->bind('tgl_expire', $data['date']);
        $this->db->bind('id_request_barang', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteRequestBarang($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_request_barang = :id_request_barang";
        $this->db->query($query);
        $this->db->bind('id_request_barang', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
