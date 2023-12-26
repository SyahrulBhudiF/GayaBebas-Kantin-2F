<?php

class TransaksiModel
{
    private $table = 'transaksi';
    private $view = 'laporan_transaksi_admin';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLaporan()
    {
        $this->db->query("SELECT * FROM " . $this->view . " ORDER BY id_transaksi DESC");
        return $this->db->resultSet();
    }

    // Operator
    public function getLastTransaksiByIdUser($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_user = :id_user ORDER BY id_transaksi DESC LIMIT 1");
        $this->db->bind('id_user', $id);
        return $this->db->single();
    }

    public function addTransaksi($id, $bayar, $kembali)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_transaksi, :bayar, :kembali)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_transaksi', date('Y-m-d H:i'));
        $this->db->bind('bayar', $bayar);
        $this->db->bind('kembali', $kembali);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getLastTransaksiDate()
    {
        $this->db->query("SELECT tgl_transaksi FROM " . $this->table . " ORDER BY id_transaksi DESC LIMIT 1");
        return $this->db->single();
    }

    public function getLastTransaksiDateId($id)
    {
        $this->db->query("SELECT tgl_transaksi FROM " . $this->table . " WHERE id_user = :id_user ORDER BY id_transaksi DESC LIMIT 1");
        $this->db->bind('id_user', $id);
        return $this->db->single();
    }
}
