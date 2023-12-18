<?php

class TransaksiModel
{
    private $table = 'transaksi';
    private $view = 'laporan_transaksi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTotalPenjualan()
    {
        $this->db->query("SELECT SUM(total) FROM " . $this->table);
        return $this->db->single();
    }

    public function getBarangTerjual()
    {
        $this->db->query("SELECT SUM(jumlah) FROM " . $this->table);
        return $this->db->single();
    }

    public function getLaporan()
    {
        $this->db->query("SELECT * FROM " . $this->view . " ORDER BY id_transaksi DESC");
        return $this->db->resultSet();
    }

    // Operator
    public function getLaporanByName($name)
    {
        $this->db->query("SELECT * FROM " . $this->view . " WHERE nama_user = :nama_user ORDER BY id_transaksi DESC");
        $this->db->bind('nama_user', $name);
        return $this->db->resultSet();
    }

    public function addTransaksi($id, $data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :id_barang, :jumlah, :total, :tgl_transaksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('id_barang', $data['idBarang']);
        $this->db->bind('jumlah', $data['quantity']);
        $this->db->bind('total', $data['price']);
        $this->db->bind('tgl_transaksi', date('Y-m-d'));

        $this->db->execute();

        return $this->db->rowCount();
    }
}
