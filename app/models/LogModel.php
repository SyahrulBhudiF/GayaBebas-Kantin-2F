<?php

class LogModel
{
    private $table = 'log';
    private $view = 'log_user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLog()
    {
        $this->db->query("SELECT * FROM " . $this->view . " ORDER BY id_log DESC");
        return $this->db->resultSet();
    }
}
