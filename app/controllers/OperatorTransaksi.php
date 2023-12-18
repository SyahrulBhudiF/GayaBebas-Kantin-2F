<?php

class OperatorTransaksi extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Operator') {
            $data['page'] = 'transaksi';
            $data['barang'] = $this->model('BarangModel')->getBarang();
            $this->view('operator/templates/header');
            $this->view('operator/pages/transaksi', $data);
            $this->view('operator/templates/footer', $data);
        } else if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Admin') {
            header("Location: " . BASEURL . "/auth/blocked");
        } else {
            header("Location: " . BASEURL);
        }
    }

    public function setTransaksi()
    {
        session_start();
        $user = $this->model('UserModel')->getUserByName($_SESSION['nama']);

        // Mengambil data dari body permintaan
        $input_data = file_get_contents("php://input");

        // Mengonversi data JSON menjadi array PHP
        $data = json_decode($input_data, true);

        // Melakukan sesuatu dengan data yang diterima
        // Misalnya, menyimpannya ke database atau melakukan operasi lainnya
        foreach ($data as $d) {
            $this->model('TransaksiModel')->addTransaksi($user['id_user'], $d);
        }

        $this->model('LogModel')->afterAddTransaksi($user['id_user']);


        // Menyiapkan respons (contoh: mengirim balik data yang diterima)
        // $response = [
        //     'status' => 'success',
        //     'data' => $data
        // ];

        // Mengirim respons dalam format JSON
        // header('Content-Type: application/json');
        // echo json_encode($response);
    }
}
