<?php
class Manager
{
    private PDO $db;



    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getDb()
    {
        return $this->db;
    }

    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }
}
