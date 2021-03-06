<?php
include_once '../Model/config.php';
session_start();
$email = $_SESSION['email'];
$action = $_GET['action'];
$conn = new Config();
if($action=='upload'){
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        $valid_extensions = array('jpeg', 'jpg','png'); 
        $code=mt_rand(10,100000);/* rename the file name*/
        $size= $_FILES['file']['size'];
        $ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
        if($size > 10485760) /*2 mb 1024*1024 bytes*/
        {
            echo json_encode(array("statusCode"=>400,'msg'=>"Image allowd less than 2 mb"));
        }
        else if(!in_array($ext, $valid_extensions)) {
            echo json_encode(array("statusCode"=>400,'msg'=>$ext.' not allowed'));
        }
        else{
           
            $result = move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $code.'.'.$ext);
            echo json_encode(array("statusCode"=>200 ,'code'=>$code));
        }
        
    }

    $sqlGetUserId = "SELECT uID FROM userinfo WHERE email='$email'";
    if($result = $conn->ExecuteQuery($sqlGetUserId)){
        $row = mysqli_fetch_assoc($result);
        $userId = $row["uID"];
        $sql = "INSERT INTO `uploadnotes`(`notes`, `userID`, `notesTitle`, `noteFile`) VALUES ('$textarea','$userId','$title','$file')";
        $result = $conn->ExecuteUpdateQuery($sql);
        if($result)
        {
            echo "File Added Successfully";
        }
        else
        {
            echo "File Not Added";
        } 
    }
    else{
        echo "User Not Found";
    }
}