<?php

    class DB
    {
        protected $conn;
        private $username = "root";
        private $hostname = "localhost";
        private $password = "";
        private $dbase = "test";

        protected function connect()
        {
            try {
                $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbase);
                return $this->conn;
            } catch (\Throwable $th) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }
    }
