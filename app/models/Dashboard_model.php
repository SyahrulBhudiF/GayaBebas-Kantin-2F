<?php

class Dashboard_model
{
    private $table = 'transaksi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTransaksi()
    {
        $this->db->query('SELECT u.nama AS nama_user, b.nama AS nama_barang, t.jumlah AS jumlah, t.total AS total, t.tgl_transaksi AS tgl_transaksi FROM ' . $this->table . ' AS t INNER JOIN barang AS b ON t.id_barang = b.id_barang INNER JOIN user AS u ON t.id_user = u.id_user');
        return $this->db->resultSet();
    }
}
