<?php

class OperatorRequestBarang extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Operator') {
            $data['page'] = 'requestBarang';
            $data['request_user'] = $this->model('RequestBarangModel')->getRequestBarangByOperatorName($_SESSION['nama']);
            $data['request'] = $this->model('RequestBarangModel')->getRequestBarangAll();
            $this->view('operator/templates/header');
            $this->view('operator/pages/requestBarang', $data);
            $this->view('operator/templates/footer', $data);
        } else if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Admin') {
            header("Location: " . BASEURL . "/auth/blocked");
        } else {
            header("Location: " . BASEURL);
        }
    }

    public function tambahDataRequest()
    {
        session_start();
        $user = $this->model('UserModel')->getUserByName($_SESSION['nama']);

        $namaFile = 'jajan.png';

        if ($_FILES['inputImg']['name']) {
            $namaFile = $_FILES['inputImg']['name'];
            $tmpName = $_FILES['inputImg']['tmp_name'];

            $ekstensiGambarValid = ['jpg', 'jpeg', '.png', '.gif'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));

            if (in_array($ekstensiGambar, $ekstensiGambarValid)) {
                $namaFileBaru = uniqid();
                $namaFileBaru = $namaFileBaru . '.';
                $namaFileBaru = $namaFileBaru . $ekstensiGambar;

                $namaFile = $namaFileBaru;
                move_uploaded_file($tmpName, '../../GayaBebas-Kantin-2F/public/Assets/img/barang/' . $namaFileBaru);
            }
        }

        if ($this->model('RequestBarangModel')->addRequestBarang($user['id_user'], $_POST, $namaFile) > 0) {
            $this->model('LogModel')->afterAddRequestBarang($user['id_user']);

            header('Location: ' . BASEURL . '/operatorrequestbarang');
        }
    }

    public function ubahDataRequestById($id)
    {
        session_start();

        $request = $this->model('RequestBarangModel')->getRequestBarangById($id);
        $namaFile = $request['foto'];

        if ($_FILES['inputImgEdit']['name']) {
            $namaFile = $_FILES['inputImgEdit']['name'];
            $tmpName = $_FILES['inputImgEdit']['tmp_name'];

            $ekstensiGambarValid = ['jpg', 'jpeg', '.png', '.gif'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));

            if (in_array($ekstensiGambar, $ekstensiGambarValid)) {
                $namaFileBaru = uniqid();
                $namaFileBaru = $namaFileBaru . '.';
                $namaFileBaru = $namaFileBaru . $ekstensiGambar;

                unlink('../../GayaBebas-Kantin-2F/public/Assets/img/barang/' . $request['foto']);

                $namaFile = $namaFileBaru;
                move_uploaded_file($tmpName, '../../GayaBebas-Kantin-2F/public/Assets/img/barang/' . $namaFileBaru);
            }
        }

        if ($this->model('RequestBarangModel')->editRequestBarang($id, $_POST, $namaFile) > 0) {
            $user = $this->model('UserModel')->getUserByName($_SESSION['nama']);
            $this->model('LogModel')->afterEditRequestBarang($user['id_user']);

            header('Location: ' . BASEURL . '/operatorrequestbarang');
        }
    }

    public function hapusDataRequestById($id)
    {
        session_start();

        $request = $this->model('RequestBarangModel')->getRequestBarangById($id);

        if ($request['foto'] != 'jajan.png') {
            unlink('../../GayaBebas-Kantin-2F/public/Assets/img/barang/' . $request['foto']);
        }

        if ($this->model('RequestBarangModel')->deleteRequestBarang($id) > 0) {
            $user = $this->model('UserModel')->getUserByName($_SESSION['nama']);
            $this->model('LogModel')->afterHapusRequestBarang($user['id_user']);

            header('Location: ' . BASEURL . '/operatorrequestbarang');
        }
    }
}
