<?php

class database
{
    protected $db;

    protected function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';charset=utf8', LOGIN, PASSWORD);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    protected function __destruct()
    {
        $this->db = NULL;
    }
}
