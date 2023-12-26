<?php

class LogModel
{
    private $table = 'log';
    private $view = 'log_user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLog()
    {
        $this->db->query("SELECT * FROM " . $this->view . " ORDER BY id_log DESC");
        return $this->db->resultSet();
    }

    public function afterAddKaryawan($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_aksi, :aksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_aksi', date('Y-m-d H:i'));
        $this->db->bind('aksi', 'Menambah Data User');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function afterEditKaryawan($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_aksi, :aksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_aksi', date('Y-m-d H:i'));
        $this->db->bind('aksi', 'Mengubah Data User');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function afterDeleteKaryawan($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_aksi, :aksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_aksi', date('Y-m-d H:i'));
        $this->db->bind('aksi', 'Menghapus Data User');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function afterAddBarang($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_aksi, :aksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_aksi', date('Y-m-d H:i'));
        $this->db->bind('aksi', 'Menambah Data Barang');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function afterEditBarang($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_aksi, :aksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_aksi', date('Y-m-d H:i'));
        $this->db->bind('aksi', 'Mengubah Data Barang');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function afterHapusBarang($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_aksi, :aksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_aksi', date('Y-m-d H:i'));
        $this->db->bind('aksi', 'Menghapus Data Barang');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function afterAcceptRequest($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_aksi, :aksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_aksi', date('Y-m-d H:i'));
        $this->db->bind('aksi', 'Menyetujui Request Barang');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function afterRejectRequest($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_aksi, :aksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_aksi', date('Y-m-d H:i'));
        $this->db->bind('aksi', 'Menolak Request Barang');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function afterAcceptRequestStock($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_aksi, :aksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_aksi', date('Y-m-d H:i'));
        $this->db->bind('aksi', 'Menyetujui Request Stock');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function afterRejectRequestStock($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_aksi, :aksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_aksi', date('Y-m-d H:i'));
        $this->db->bind('aksi', 'Menolak Request Stock');

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Operator
    public function getLogByName($name)
    {
        $this->db->query("SELECT * FROM " . $this->view . " WHERE nama_user = :nama_user ORDER BY id_log DESC");
        $this->db->bind('nama_user', $name);
        return $this->db->resultSet();
    }

    public function afterAddRequestBarang($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_aksi, :aksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_aksi', date('Y-m-d H:i'));
        $this->db->bind('aksi', 'Menambah Request Barang');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function afterEditRequestBarang($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_aksi, :aksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_aksi', date('Y-m-d H:i'));
        $this->db->bind('aksi', 'Mengubah Request Barang');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function afterHapusRequestBarang($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_aksi, :aksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_aksi', date('Y-m-d H:i'));
        $this->db->bind('aksi', 'Menghapus Request Barang');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function afterAddTransaksi($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_aksi, :aksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_aksi', date('Y-m-d H:i'));
        $this->db->bind('aksi', 'Melakukan Transaksi');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function afterAddRequestStock($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_user, :tgl_aksi, :aksi)";
        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('tgl_aksi', date('Y-m-d H:i'));
        $this->db->bind('aksi', 'Menambah Request Stock');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getLastLog()
    {
        $this->db->query("SELECT tgl_aksi FROM " . $this->table . " ORDER BY tgl_aksi DESC LIMIT 1");
        return $this->db->single();
    }

    public function getLastLogId($id)
    {
        $this->db->query("SELECT tgl_aksi FROM " . $this->table . " WHERE id_user = :id_user ORDER BY tgl_aksi DESC LIMIT 1");
        $this->db->bind('id_user', $id);
        return $this->db->single();
    }
}
