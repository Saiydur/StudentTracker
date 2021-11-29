<?php
include('../Model/UserLogin.php');
$email="";
$password="";
$emailErr = "";
$passwordErr = "";
$flag=1;
$userResult="";
$error="";
if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
    header('location:../View/blogs.php');
}
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(empty($email)){
        $flag=0;
        $emailErr="Email Required";
    }
        else{
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $flag=0;
                $emailErr="Enter Valid Email";
            }
        }
    if(empty($password)){
        $flag=0;
        $passwordErr="Password Required";
    }

    if($flag==1){
        $user = new User($email,$password);
        $userResult=$user->GetUserFromDB();
        if($userResult==null)
        {
            $error="Incorrect Email or Password";
        }
        else{
            $_SESSION['email']=$userResult['email'];
            $_SESSION['uID']=$userResult['uID'];
            $_SESSION['role']=$userResult['userRoleName'];
            header('location:../View/todolist.php');
        }
    }
}
?>