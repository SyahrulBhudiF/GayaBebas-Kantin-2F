<?php

class OperatorRequestStock extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Operator') {
            $data['page'] = 'requestStock';
            $data['barang'] = $this->model('BarangModel')->getBarang();
            $this->view('operator/templates/header');
            $this->view('operator/pages/requestStock', $data);
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

        if ($this->model('RequestStockModel')->addRequestStock($user['id_user'], $_POST) > 0) {
            $this->model('LogModel')->afterAddRequestStock($user['id_user']);

            Flasher::setFlash('Berhasil !', 'Request stock berhasil di kirim.', 'success');
            header('Location: ' . BASEURL . '/operatorrequeststock');
        }
    }
}
