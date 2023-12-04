<?php

class Dashboard extends Controller
{
    public function index()
    {
        $data['page'] = 'dashboard';
        // $data['transaksi'] = $this->model('Dashboard_model')->getTransaksi();
        $this->view('templates/header');
        $this->view('admin/pages/dashboard', $data);
        $this->view('templates/footer', $data);
    }
}
