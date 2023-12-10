<?php

class OperatorTransaksi extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Operator') {
            $data['page'] = 'transaksi';
            $this->view('operator/templates/header');
            $this->view('operator/pages/transaksi');
            $this->view('operator/templates/footer', $data);
        } else if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Admin') {
            header("Location: " . BASEURL . "/auth/blocked");
        } else {
            header("Location: " . BASEURL);
        }
    }
}
