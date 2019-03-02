<?php
    require("settings.php");
    class DAO {
        protected $conn;
        function __construct()
        {
            global $Env;
            $servername = $Env['db_adrs'];
            $dbname = $Env['db_dbname'];
            $username = $Env['db_username'];
            $password = $Env['db_password'];

            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
        }
        function prepare($sql)
        {
            return $this->conn->prepare($sql);
        } 
        function query($sql)
        {
            return $this->conn->query($sql);
        }
        function __destruct()
        {
            $this->conn = null;
        }
    }