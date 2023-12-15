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
}
