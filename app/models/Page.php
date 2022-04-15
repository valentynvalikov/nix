<?php

namespace app\models;

use app\libraries\Database;

class Page
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Find page by id/Находим страницу по id
    public function getPageById($id)
    {
        $this->db->query('SELECT * FROM pages WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
}
