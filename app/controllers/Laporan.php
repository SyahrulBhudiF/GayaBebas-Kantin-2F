<?php

class Laporan extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Admin') {
            $data['page'] = 'laporan';
            $data['laporan'] = $this->model('TransaksiModel')->getLaporan();

            $this->model('NotifModel')->updateNotif($_SESSION['id'], "laporan", date('Y-m-d'));

            $this->view('admin/templates/header');
            $this->view('admin/pages/laporan', $data);
            $this->view('admin/templates/footer', $data);
        } else if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Operator') {
            header("Location: " . BASEURL . "/auth/blocked");
        } else {
            header("Location: " . BASEURL);
        }
    }

    public function getDetailTransaksi($id)
    {
        $data = $this->model('DetailTransaksiModel')->getDetailLaporanByIdTransaksi($id);

        header('Content-Type: application/json');

        echo json_encode($data);
    }
}
