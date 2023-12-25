<?php

class Notif extends Controller
{
    public function getNotif($id)
    {
        session_start();

        $data = $this->model('NotifModel')->getNotif($id);

        echo json_encode($data);
    }

    public function getLastLaporan()
    {
        session_start();

        $data = $this->model('TransaksiModel')->getLastTransaksiDate();

        echo json_encode($data);
    }

    public function getLastLog()
    {
        session_start();

        $data = $this->model('LogModel')->getLastLog();

        echo json_encode($data);
    }
}
