<?php

class Model
{

    protected $connection;
    public function __construct()
    {
        $this->connection = require "app/config/connection.php";
    }
}
