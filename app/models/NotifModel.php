<?php

class NotifModel
{
    private $table = 'notif';
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getNotif($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_user = :id_user");
        $this->db->bind('id_user', $id);
        return $this->db->single();
    }

    public function insert($id)
    {
        if (!$this->isNotifExists($id)) {
            $this->db->query("INSERT INTO " . $this->table . " (id_user) VALUES (:id_user)");
            $this->db->bind('id_user', $id);
            $this->db->execute();


            return $this->db->rowCount();
        }

        return 0;
    }

    public function updateNotif($id, $pageVisited, $createdAt)
    {
        $this->db->query("UPDATE notif SET page_visited = :pageVisited, created_at = :createdAt WHERE id_user = :id");
        $this->db->bind('id', $id);
        $this->db->bind('pageVisited', $pageVisited);
        $this->db->bind('createdAt', $createdAt);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function isNotifExists($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_user = :id_user");
        $this->db->bind('id_user', $id);
        $this->db->execute();

        return ($this->db->rowCount() > 0);
    }
}
