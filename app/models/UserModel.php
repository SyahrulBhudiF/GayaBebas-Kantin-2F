<?php

class UserModel
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser($username, $password)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE usename = :username AND password = :password");
        $this->db->bind("username", $username);
        $this->db->bind("password", $password);
        return $this->db->resultSet();
    }
}
