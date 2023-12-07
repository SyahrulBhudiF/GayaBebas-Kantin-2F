<?php

class Laporan extends Controller
{
    public function index()
    {
        $data['page'] = 'laporan';
        $this->view('admin/templates/header');
        $this->view('admin/pages/laporan');
        $this->view('admin/templates/footer', $data);
    }
}
