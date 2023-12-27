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
        session_start();

        $hashPassword = hash_hmac('sha256', $_POST['password'], '6hUb#1iWB');

        if ($this->model('UserModel')->addKaryawan($_POST, $hashPassword) > 0) {
            $user = $this->model('UserModel')->getUserByName($_SESSION['nama']);
            $this->model('LogModel')->afterAddKaryawan($user['id_user']);

            Flasher::setFlash('Berhasil !', 'Data karyawan baru berhasil di tambahkan.', 'success');
            header('Location: ' . BASEURL . '/datakaryawan');
        }
    }
    public function ubahDataKaryawanById($id)
    {
        session_start();

        if (!empty($_POST['password'])) {
            $hashPassword = hash_hmac('sha256', $_POST['password'], '6hUb#1iWB');
        } else {
            $password = $this->model('UserModel')->getUserById($id);
            $hashPassword = $password['password'];
        }

        if ($this->model('UserModel')->editKaryawan($id, $_POST, $hashPassword) > 0) {
            $user = $this->model('UserModel')->getUserByName($_SESSION['nama']);
            $this->model('LogModel')->afterEditKaryawan($user['id_user']);

            Flasher::setFlash('Berhasil !', 'Data karyawan berhasil di ubah.', 'success');
            header('Location: ' . BASEURL . '/datakaryawan');
        }
    }

    public function hapusDataKaryawanById($id)
    {
        session_start();

        if ($this->model('UserModel')->deleteKaryawan($id) > 0) {
            $user = $this->model('UserModel')->getUserByName($_SESSION['nama']);
            $this->model('LogModel')->afterDeleteKaryawan($user['id_user']);

            Flasher::setFlash('Berhasil !', 'Data karyawan berhasil di hapus.', 'success');
            header('Location: ' . BASEURL . '/datakaryawan');
        }
    }
}
