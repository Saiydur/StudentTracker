<?php
include('../Model/UserRegistration.php');
//global variable for future use
$firstName="";
$lastName="";
$email="";
$contactNo="";
$password="";
$passwordConfirm="";
$flag=1;
$result="";
//variables for Error Handeling
$firstNameErr="";
$lastNameErr="";
$emailErr="";
$contactNoErr="";
$passwordErr="";
$passwordConfirmErr="";
if(isset($_POST['register'])){
    $firstName=$_POST['firstname'];
    $lastName=$_POST['lastname'];
    $email=$_POST['email'];
    $contactNo=$_POST['phone'];
    $password=$_POST['password'];
    $passwordConfirm=$_POST['passwordConfirmation'];
    if(empty($firstName)){
        $flag=0;
        $firstNameErr="First Name Required";
    }
    else{
        if(!preg_match("/^[a-zA-Z]*$/",$firstName)){
            $flag=0;
            $firstNameErr="Only letters accepted";
        }
    }
    if(empty($lastName)){
        $flag=0;
        $lastNameErr="Last Name Required";
    }
    else{
        if(!preg_match("/^[a-zA-Z]*$/",$lastName)){
            $flag=0;
            $lastNameErr="Only letters accepted";
        }
    }
    if(empty($email)){
        $flag=0;
        $emailErr="Email required";
    }
    else{
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $flag=0;
            $emailErr="Invalid email";
        }
    }
    if(empty($contactNo)){
        $flag=0;
        $contactNoErr="Contact Number Required";
    }
    else{
        if($_POST['countryCode']==="+880"){
            if(strlen($contactNo)!=10){
                $flag=0;
                $contactNoErr="Invalid phone number";
            }
        }
        else if($_POST['countryCode']==="+02"){
            if(strlen($contactNo)!=7){//9886299
                $flag=0;
                $contactNoErr="Invalid telephone number";
            }
        }
        else{
            $contactNoErr="Select Option";
        }
    }
    if(empty($password)){
        $flag=0;
        $passwordErr="Password Required";
    }
    else{
        if (strlen($_POST["password"]) < 8) {
            $flag=0;
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $flag=0;
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $flag=0;
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $flag=0;
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }
    }
    if(empty($passwordConfirm)){
        $flag=0;
        $passwordConfirmErr="Password Required";
    }
    else{
        if($password!==$passwordConfirm){
            $flag=0;
            $passwordConfirmErr="Password Dont Match";  
        }
    }

    //if all the fields are filled and valid
    if($flag!=0)
    {
        $user = new UserInfo($firstName,$lastName,$email,$contactNo,$password);
        $result=$user->InsertDataToDB();
    }
}