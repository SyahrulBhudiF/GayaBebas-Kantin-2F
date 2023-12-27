<?php

class BarangModel
{
    private $table = 'barang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTotalStok()
    {
        $this->db->query("SELECT SUM(stok) FROM " . $this->table);
        return $this->db->single();
    }

    public function getBarang()
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE status = 'Aktif' ORDER BY stok ASC");
        return $this->db->resultSet();
    }

    public function getBarangById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_barang = :id_barang");
        $this->db->bind('id_barang', $id);
        return $this->db->single();
    }

    public function addBarang($data, $gambar)
    {
        $query = "INSERT INTO " . $this->table . " VALUES ('', :foto, :nama, :kategori, :stok, :hrg_jual, :tgl_expire, :status)";
        $this->db->query($query);
        $this->db->bind('foto', $gambar);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('hrg_jual', $data['harga']);
        $this->db->bind('tgl_expire', $data['date']);
        $this->db->bind('status', 'Aktif');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editBarang($id, $data, $gambar)
    {
        $query = "UPDATE " . $this->table . " SET foto = :foto, nama = :nama, kategori = :kategori, stok = :stok, hrg_jual = :hrg_jual, tgl_expire = :tgl_expire WHERE id_barang = :id_barang";
        $this->db->query($query);
        $this->db->bind('foto', $gambar);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('hrg_jual', $data['harga']);
        $this->db->bind('tgl_expire', $data['date']);
        $this->db->bind('id_barang', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteBarang($id)
    {
        $query = "UPDATE " . $this->table . " SET status = :status WHERE id_barang = :id_barang";
        $this->db->query($query);
        $this->db->bind('status', 'Non-Aktif');
        $this->db->bind('id_barang', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
