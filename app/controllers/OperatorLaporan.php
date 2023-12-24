<?php

class OperatorLaporan extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Operator') {
            $data['page'] = 'laporan';
            $data['laporan'] = $this->model('DetailTransaksiModel')->getLaporanByOperatorName($_SESSION['nama']);
            $this->view('operator/templates/header');
            $this->view('operator/pages/laporan', $data);
            $this->view('operator/templates/footer', $data);
        } else if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Admin') {
            header("Location: " . BASEURL . "/auth/blocked");
        } else {
            header("Location: " . BASEURL);
        }
    }
}
