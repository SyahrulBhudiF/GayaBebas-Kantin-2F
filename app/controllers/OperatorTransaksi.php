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

    public function setTransaksi($bayar, $kembali)
    {
        session_start();
        $user = $this->model('UserModel')->getUserByName($_SESSION['nama']);

        // Mengambil data dari body permintaan
        $input_data = file_get_contents("php://input");

        // Mengonversi data JSON menjadi array PHP
        $data = json_decode($input_data, true);

        // Melakukan sesuatu dengan data yang diterima
        // Misalnya, menyimpannya ke database atau melakukan operasi lainnya
        if ($this->model('TransaksiModel')->addTransaksi($user['id_user'], $bayar, $kembali) > 0) {
            $transaksi = $this->model('TransaksiModel')->getLastTransaksiByIdUser($user['id_user']);

            foreach ($data as $d) {
                $this->model('DetailTransaksiModel')->addDetailTransaksi($transaksi['id_transaksi'], $d);
            }

            $this->model('LogModel')->afterAddTransaksi($user['id_user']);

            Flasher::setFlash('Berhasil !', 'Transaksi berhasil di catat.', 'success');
        }

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
