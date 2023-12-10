<?php

class DataBarang extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Admin') {
            $data['page'] = 'dataBarang';
            $data['barang'] = $this->model('BarangModel')->getBarang();
            $this->view('admin/templates/header');
            $this->view('admin/pages/dataBarang', $data);
            $this->view('admin/templates/footer', $data);
        } else if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Operator') {
            header("Location: " . BASEURL . "/auth/blocked");
        } else {
            header("Location: " . BASEURL);
        }
    }

    public function tambahDataBarang()
    {
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

        if ($this->model('BarangModel')->addBarang($_POST, $namaFile) > 0) {
            header('Location: ' . BASEURL . '/databarang');
        }
    }

    public function hapusDataBarangById($id)
    {
        $barang = $this->model('BarangModel')->getBarangById($id);

        if ($barang['foto'] != 'jajan.png') {
            unlink('../../GayaBebas-Kantin-2F/public/Assets/img/barang/' . $barang['foto']);
        }

        if ($this->model('BarangModel')->deleteBarang($id) > 0) {
            header('Location: ' . BASEURL . '/databarang');
        }
    }
}
