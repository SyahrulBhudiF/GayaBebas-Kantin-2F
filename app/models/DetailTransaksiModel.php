<?php

class DetailTransaksiModel
{
    private $table = 'detail_transaksi';
    private $view = 'laporan_transaksi_operator';
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

    public function getDetailLaporanByIdTransaksi($id)
    {
        $this->db->query("SELECT * FROM " . $this->view . " WHERE id_transaksi = :id_transaksi");
        $this->db->bind('id_transaksi', $id);
        return $this->db->resultSet();
    }

    // Operator
    public function getLaporanByOperatorName($name)
    {
        $this->db->query("SELECT * FROM " . $this->view . " WHERE nama_user = :nama_user ORDER BY id_detail_transaksi DESC");
        $this->db->bind('nama_user', $name);
        return $this->db->resultSet();
    }

    public function addDetailTransaksi($id, $data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_transaksi, :id_barang, :jumlah, :total)";
        $this->db->query($query);
        $this->db->bind('id_transaksi', $id);
        $this->db->bind('id_barang', $data['idBarang']);
        $this->db->bind('jumlah', $data['quantity']);
        $this->db->bind('total', $data['price']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
