<?php

class DataKaryawan extends Controller
{
    public function index()
    {
        $data['page'] = 'dataKaryawan';
        $this->view('templates/header');
        $this->view('admin/pages/dataKaryawan');
        $this->view('templates/footer', $data);
    }
}
