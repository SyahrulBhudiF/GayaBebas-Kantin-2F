<?php

class Log extends Controller
{
    public function index()
    {
        $data['page'] = 'log';
        $this->view('templates/header');
        $this->view('admin/pages/log');
        $this->view('templates/footer', $data);
    }
}
