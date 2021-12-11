<?php
include_once '../Model/config.php';
session_start();
$useremail = $_SESSION['email'];
$case = $_GET['case'];
$conn = new Config();
if($case=='add'){
      $data = stripslashes(file_get_contents("php://input"));
      $mydata = json_decode($data,true);

      $institutionName = $mydata['institutionName'];
      $semesterName = $mydata['semesterName'];
      $courseName = $mydata['courseName'];
      $cgpa = $mydata['cgpa'];
      $email = $mydata["email"];
      $sqlGetUserId = "SELECT uID FROM userinfo WHERE email='$email'";
      if($result = $conn->ExecuteQuery($sqlGetUserId))
      {
            $row = mysqli_fetch_assoc($result);
            $userId = $row["uID"];
            $sql = "INSERT INTO `uploadmarks`(`userId`, `institution_name`, `semester_name`, `course_name`, `cgpa`) VALUES ('$userId','$institutionName','$semesterName','$courseName','$cgpa')";
            $result = $conn->ExecuteUpdateQuery($sql);
            if($result)
            {
                  echo "Marks uploaded Successfully";
            }
            else
            {
                  echo "Marks Not Added";
            } 
      }    
      else
      {
            echo "User Not Found";
      }
}

if($case=='delete'){
      $data = stripslashes(file_get_contents("php://input"));
      $mydata = json_decode($data,true);
      $marksId = $mydata["marksId"];
      $sql = "DELETE FROM `uploadmarks` WHERE `marksId`='$marksId'";
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