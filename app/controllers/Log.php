<?php

class Log extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Admin') {
            $data['page'] = 'log';
            $data['log'] = $this->model('LogModel')->getLog();

            date_default_timezone_set('Asia/Jakarta');
            $this->model('NotifModel')->updateNotif($_SESSION['id'], "log", date('Y-m-d H:i'));

            $this->view('admin/templates/header');
            $this->view('admin/pages/log', $data);
            $this->view('admin/templates/footer', $data);
        } else if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Operator') {
            header("Location: " . BASEURL . "/auth/blocked");
        } else {
            header("Location: " . BASEURL);
        }
    }
}
