<?php
$name="";
$password="";
if(isset($_SESSION['name'])){
    header('location:../blogs.php');
}
if(isset($_POST['login'])){
    session_start();
    $name = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION['name']=$name;
    $_SESSION['id']=rand(0,6);
    if(!empty($_SESSION['id'])){
    header('location:../View/blogs.php');
    }
}
else{
    $name="";
    $password="";
}
?>