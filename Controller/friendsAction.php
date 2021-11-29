<?php
require_once '../Model/config.php';
class friendsAction{
    private $config;
    
    public function __construct(){
        $this->config = new Config();
    }

    public function ShowAllFriends(){
        $data=$this->getFriends();
        echo "<div class='container'>";
        echo "<table class='table table-dark'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>Full Name</th>";
        echo "<th scope='col'>Contact Number</th>";
        echo "<th scope='col'>Email</th>";
        echo "<th scope='col'>Role</th>";
        echo "<th scope='col'>Actions</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach($data as $row){
            echo "<tr>";
            echo "<td>".$row['fullName']."</td>";
            echo "<td>".$row['contactNo']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['userRoleName']."</td>";
            echo "<td>"."<a href='../ProjectDatabaseModel.png'>View Details</a>"."</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
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
}