<?php


class HomeController
{
    private $db;
    /** Any Contruct of Controller have a Connection Parameter. */
    public function __construct($connection)
    {
        $this->db = $connection;
    }
    public function generate()
    {
        echo password_hash($_GET["text"], PASSWORD_BCRYPT);
    }
    public function index()
    {
        require "views/index.php";
    }
}
