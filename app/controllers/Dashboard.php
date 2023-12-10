<?php

class Dashboard extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Admin') {
            $data['page'] = 'dashboard';
            $data['total_penjualan'] = $this->model('TransaksiModel')->getTotalPenjualan();
            $data['barang_terjual'] = $this->model('TransaksiModel')->getBarangTerjual();
            $data['total_stok'] = $this->model('BarangModel')->getTotalStok();
            $data['barang'] = $this->model('BarangModel')->getBarang();
            $this->view('admin/templates/header');
            $this->view('admin/pages/dashboard', $data);
            $this->view('admin/templates/footer', $data);
        } else if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Operator') {
            header("Location: " . BASEURL . "/auth/blocked");
        } else {
            header("Location: " . BASEURL);
        }
    }
}
