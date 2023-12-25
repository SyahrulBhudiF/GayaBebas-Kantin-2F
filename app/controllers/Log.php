<?php

class Log extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == 'Admin') {
            $data['page'] = 'log';
            $data['log'] = $this->model('LogModel')->getLog();

            $this->model('NotifModel')->updateNotif($_SESSION['id'], "log", date('Y-m-d'));

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
