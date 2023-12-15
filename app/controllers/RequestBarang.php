<?php

class RequestBarang extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Admin') {
            $data['page'] = 'dataBarang';
            $data['request'] = $this->model('RequestBarangModel')->getRequestBarang();
            $this->view('admin/templates/header');
            $this->view('admin/pages/requestBarang', $data);
            $this->view('admin/templates/footer', $data);
        } else if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Operator') {
            header("Location: " . BASEURL . "/auth/blocked");
        } else {
            header("Location: " . BASEURL);
        }
    }

    public function setujuiRequestBarangById($id)
    {
        if ($this->model('RequestBarangModel')->acceptRequest($id) > 0) {
            header('Location: ' . BASEURL . '/requestbarang');
        }
    }

    public function tolakRequestBarangById($id)
    {
        if ($this->model('RequestBarangModel')->rejectRequest($id) > 0) {
            header('Location: ' . BASEURL . '/requestbarang');
        }
    }
}
