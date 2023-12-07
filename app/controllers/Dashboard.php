<?php

class Dashboard extends Controller
{
    public function index()
    {
        $data['page'] = 'dashboard';
        $this->view('admin/templates/header');
        $this->view('admin/pages/dashboard', $data);
        $this->view('admin/templates/footer', $data);
    }
}
