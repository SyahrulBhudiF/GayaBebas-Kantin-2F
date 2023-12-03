<?php

class DataBarang extends Controller
{
    public function index()
    {
        $data['page'] = 'dataBarang';
        $this->view('templates/header');
        $this->view('admin/pages/dataBarang');
        $this->view('templates/footer', $data);
    }
}
