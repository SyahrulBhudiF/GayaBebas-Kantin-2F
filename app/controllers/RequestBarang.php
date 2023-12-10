<?php

class RequestBarang extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Admin') {
            $data['page'] = 'dataBarang';
            $this->view('admin/templates/header');
            $this->view('admin/pages/requestBarang');
            $this->view('admin/templates/footer', $data);
        } else if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Operator') {
            header("Location: " . BASEURL . "/auth/blocked");
        } else {
            header("Location: " . BASEURL);
        }
    }
}
