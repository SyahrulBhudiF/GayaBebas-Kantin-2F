<?php

class DataKaryawan extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Admin') {
            $data['page'] = 'dataKaryawan';
            $data['karyawan'] = $this->model('UserModel')->getKaryawan();
            $this->view('admin/templates/header');
            $this->view('admin/pages/dataKaryawan', $data);
            $this->view('admin/templates/footer', $data);
        } else if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Operator') {
            header("Location: " . BASEURL . "/auth/blocked");
        } else {
            header("Location: " . BASEURL);
        }
    }

    public function tambahDataKaryawan()
    {
        if ($this->model('UserModel')->addKaryawan($_POST) > 0) {
            header('Location: ' . BASEURL . '/datakaryawan');
        }
    }
    public function ubahDataKaryawanById($id)
    {
        if ($this->model('UserModel')->editKaryawan($id, $_POST) > 0) {
            header('Location: ' . BASEURL . '/datakaryawan');
        }
    }

    public function hapusDataKaryawanById($id)
    {
        if ($this->model('UserModel')->deleteKaryawan($id) > 0) {
            header('Location: ' . BASEURL . '/datakaryawan');
        }
    }
}
