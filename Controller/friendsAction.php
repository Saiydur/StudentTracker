<?php
require_once '../Model/config.php';
class friendsAction{
    private $config;
    
    public function __construct(){
        $this->config = new Config();
    }

    public function ShowAllFriends(){
        $data=$this->getFriends();
        if($data>0){
            echo "<table class='table table-dark'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>First Name</th>";
            echo "<th scope='col'>Last Name</th>";
            echo "<th scope='col'>Contact Number</th>";
            echo "<th scope='col'>Email</th>";
            echo "<th scope='col'>Role</th>";
            echo "<th scope='col'>Actions</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach($data as $row){
                echo "<tr>";
                echo "<td>".$row['firstName']."</td>";
                echo "<td>".$row['lastName']."</td>";
                echo "<td>".$row['contactNo']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['userRoleName']."</td>";
                echo "<td>"."<a href='../View/UserDetails.php?userEmail={$row['email']}'>Go For Action</a>"."</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }
        else{
            echo "<h3>No Users Found</h3>";
        }
    }

    public function getFriends(){
        $id = $_SESSION['email'];
        $sql = "SELECT * FROM userlist WHERE email!='$id'";
        if($result = $this->config->ExecuteQuery($sql)){
            $data = array();
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    }
    public function getSingleFriends($param){
        $sql = "SELECT * FROM userlist WHERE email='$param'";
        if($result = $this->config->ExecuteQuery($sql)){
            $data = array();
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    }

    public function UpdateInfo($fn,$ln,$email,$cn,$role,$prevEmail){
        $fullName = $fn." ".$ln;
        $sql = "UPDATE `userinfo` SET `firstName`='$fn',`lastName`='$ln',`contactNo`='$cn',`email`='$email', `fullName`='$fullName' WHERE `email`='$prevEmail';";
        if($this->config->ExecuteUpdateQuery($sql) ){
           $sqlrole="UPDATE `userrole` SET `userRoleName`='$role' WHERE `userid`=(SELECT uID from `userinfo` where email='$prevEmail');";
              if($this->config->ExecuteUpdateQuery($sqlrole)){
                return true;
              }
              else{
                return false;
              }
        }
        else{
            return false;
        }
    }
    public function DeleteUser($userId){
        $sql = "DELETE FROM `userrole` WHERE userid=(SELECT uID FROM userinfo WHERE email='$userId');";
        if($this->config->ExecuteUpdateQuery($sql)){
            $sql2="DELETE FROM `userinfo` WHERE email='$userId';";
            if($this->config->ExecuteUpdateQuery($sql2)){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
}