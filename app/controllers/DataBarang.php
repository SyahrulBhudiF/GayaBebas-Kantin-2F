<?php

class DataBarang extends Controller
{
    public function index()
    {
        $data['page'] = 'dataBarang';
        $this->view('admin/templates/header');
        $this->view('admin/pages/dataBarang');
        $this->view('admin/templates/footer', $data);
    }
}
