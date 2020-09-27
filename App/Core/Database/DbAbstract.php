<?php


namespace App\Core\Database;


abstract class DbAbstract
{
    public $db;

    public function __construct()
    {
        $this->db = Db::getInstance()->db;
    }
}