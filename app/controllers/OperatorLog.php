<?php

class OperatorLog extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Operator') {
            $data['page'] = 'log';
            $data['log'] = $this->model('LogModel')->getLogByName($_SESSION['nama']);

            date_default_timezone_set('Asia/Jakarta');
            $this->model('NotifModel')->updateNotif($_SESSION['id'], "log", date('Y-m-d H:i'));

            $this->view('operator/templates/header');
            $this->view('operator/pages/log', $data);
            $this->view('operator/templates/footer', $data);
        } else if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Admin') {
            header("Location: " . BASEURL . "/auth/blocked");
        } else {
            header("Location: " . BASEURL);
        }
    }
}
