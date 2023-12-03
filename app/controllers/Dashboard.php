<?php

class Dashboard extends Controller
{
    public function index()
    {
        $data['page'] = 'dashboard';
        $this->view('templates/header');
        $this->view('admin/pages/dashboard');
        $this->view('templates/footer', $data);
    }
}
