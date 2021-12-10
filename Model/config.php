<?php
class Config{
    private static $host = "localhost";
    private static $user = "root";
    private static $pass = "";
    private static $db = "studenttracker";

    public static function getHost(){
        return self::$host;
    }

    public static function getUser(){
        return self::$user;
    }

    public static function getPass(){
        return self::$pass;
    }

    public static function getDB(){
        return self::$db;
    }

    public static function getConnection(){
        $conn = new mysqli(self::$host, self::$user, self::$pass, self::$db);
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
    public static function closeConnection($conn){
        $conn->close();
    }
    public function __construct(){
        $this->getConnection();
    }

    public function ExecuteQuery($sql){
        $conn = $this->getConnection();
        if($result = $conn->query($sql)){
            if($result->num_rows > 0){
                $this->closeConnection($conn);
                return $result;
            }
        }else{
            $this->closeConnection($conn);
            return false;
        }
    }

    public function ExecuteUpdateQuery($sql){
        $conn = $this->getConnection();
        if($conn->query($sql)){
            $this->closeConnection($conn);
            return true;
        }
        else{
            $this->closeConnection($conn);
            return false;
        }
    }

}