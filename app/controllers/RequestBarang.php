<?php

class RequestBarang extends Controller
{
    public function index()
    {
        $data['page'] = 'dataBarang';
        $this->view('admin/templates/header');
        $this->view('admin/pages/requestBarang');
        $this->view('admin/templates/footer', $data);
    }
}
