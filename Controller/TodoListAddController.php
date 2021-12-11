<?php
include_once '../Model/config.php';
session_start();
$useremail = $_SESSION['email'];
$case = $_GET['case'];
$conn = new Config();
if($case=='add'){
    $data = stripslashes(file_get_contents("php://input"));
    $mydata = json_decode($data,true);
    $taskName = $mydata["list"];
    $email = $mydata["email"];
    $sqlGetUserId = "SELECT uID FROM userinfo WHERE email='$email'";
    if($result = $conn->ExecuteQuery($sqlGetUserId)){
        $row = mysqli_fetch_assoc($result);
        $userId = $row["uID"];
        $sql = "INSERT INTO `taskslist`(`taskName`, `taskDone`, `userId`) VALUES ('$taskName','no','$userId')";
        $result = $conn->ExecuteUpdateQuery($sql);
        if($result)
        {
            echo "Task Added Successfully";
        }
        else
        {
            echo "Task Not Added";
        } 
    }
    else{
        echo "User Not Found";
    }
}
if($case=='get'){
    $sql = "SELECT * FROM taskslist WHERE userId=(SELECT uID FROM userinfo WHERE email='$useremail')";
        if($result = $conn->ExecuteQuery($sql)){
            $rows = array();
            while($row = mysqli_fetch_assoc($result)){
                $rows[] = $row;
            }
            echo json_encode($rows);
        }
        else{
            echo "No Task Found";
        }
}
if($case=='edit'){
    $data = stripslashes(file_get_contents("php://input"));
    $mydata = json_decode($data,true);
    $taskDone = $mydata["taskDone"];
    $taskId = $mydata["taskId"];
    $sql = "UPDATE `taskslist` SET `taskDone`='$taskDone' WHERE `taskId`='$taskId'";
    $result = $conn->ExecuteUpdateQuery($sql);
    if($result)
    {
        echo "Task Updated Successfully";
    }
    else
    {
        echo "Task Not Updated";
    } 
}
if($case=='delete'){
    $data = stripslashes(file_get_contents("php://input"));
    $mydata = json_decode($data,true);
    $taskId = $mydata["taskId"];
    $sql = "DELETE FROM `taskslist` WHERE `taskId`='$taskId'";
    $result = $conn->ExecuteUpdateQuery($sql);
    if($result)
    {
        echo "Task Deleted Successfully";
    }
    else
    {
        echo "Task Not Deleted";
    } 
}