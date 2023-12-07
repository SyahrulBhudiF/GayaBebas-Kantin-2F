<?php

class Log extends Controller
{
    public function index()
    {
        $data['page'] = 'log';
        $this->view('admin/templates/header');
        $this->view('admin/pages/log');
        $this->view('admin/templates/footer', $data);
    }
}
