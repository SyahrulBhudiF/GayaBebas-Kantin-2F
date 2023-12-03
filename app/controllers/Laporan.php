<?php

class Laporan extends Controller
{
    public function index()
    {
        $data['page'] = 'laporan';
        $this->view('templates/header');
        $this->view('admin/pages/laporan');
        $this->view('templates/footer', $data);
    }
}
