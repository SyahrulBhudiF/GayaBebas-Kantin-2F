<?php

class RequestStok extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Admin') {
            $data['page'] = 'dataBarang';
            $data['request'] = $this->model('RequestStockModel')->getRequestStock();
            $this->view('admin/templates/header');
            $this->view('admin/pages/requestStok', $data);
            $this->view('admin/templates/footer', $data);
        } else if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Operator') {
            header("Location: " . BASEURL . "/auth/blocked");
        } else {
            header("Location: " . BASEURL);
        }
    }

    public function setujuiRequestStockById($id)
    {
        session_start();

        if ($this->model('RequestStockModel')->acceptRequest($id) > 0) {
            $user = $this->model('UserModel')->getUserByName($_SESSION['nama']);
            $this->model('LogModel')->afterAcceptRequestStock($user['id_user']);

            header('Location: ' . BASEURL . '/requeststok');
        }
    }

    public function tolakRequestStockById($id)
    {
        session_start();

        if ($this->model('RequestStockModel')->rejectRequest($id) > 0) {
            $user = $this->model('UserModel')->getUserByName($_SESSION['nama']);
            $this->model('LogModel')->afterRejectRequestStock($user['id_user']);

            header('Location: ' . BASEURL . '/requeststok');
        }
    }
}
