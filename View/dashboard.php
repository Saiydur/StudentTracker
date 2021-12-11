<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrapcdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Profile</title>
</head>
<body>
<?php include('../Global/Header.php');
include('../Global/UserHeader.php');
?>
<?php 
include "../Controller/friendsAction.php";
$userFirstName="";
$userLastName="";
$useremail="";
$userPhone="";
$userRole="";
$userId=$_SESSION['email'];
$userAction = new friendsAction();
$userDetails=$userAction->getSingleFriends($userId);
foreach ($userDetails as $userDetail) {
    $userFirstName=$userDetail["firstName"];
    $userLastName=$userDetail["lastName"];
    $useremail=$userDetail["email"];
    $userPhone=$userDetail["contactNo"];
    $userRole=$userDetail["userRoleName"];
}
?>
        <div class="col-md-9 col-lg-10 pl-0 pr-0">
            <div class="jumbotron jumbotron-fluid bg-light mb-0">
                <div class="container">
                   <!--  Write Your Code From Here -->
                   <form action="" method="post">
                        <div class="container row p-4">
                            <div class="col-md-6 col-sm-12">
                                <h6>First Name</h6>
                                <input type="text" name="fn" class="w-100" value="<?php echo $userFirstName?>">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <h6>Last Name</h6>
                                <input type="text" name="ln" class="w-100" value="<?php echo $userLastName?>">
                            </div>
                        </div>
                        <div class="container row p-4">
                            <div class="col-md-6 col-sm-12">
                                <h6>Email</h6>
                                <input type="text" name="email" class="w-100" value="<?php echo $useremail?>">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <h6>Contact Number</h6>
                                <input type="text" name="cn" class="w-100" value="<?php echo $userPhone?>">
                            </div>  
                        </div>
                        <div class="container row p-4">
                            <div class="col-md-6 col-sm-12">
                                <h6>Status</h6>
                                <input type="text" name="status" class="w-100" value="Activate">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <h6>Role</h6>
                                <input type="text" name="role" value="<?php echo $userRole?>">
                            </div>  
                        </div>  
                        <div class="text-center row p-4">
                            <div class="col-md-12 col-sm-12">
                                <button id="btnEdit" name="editBtn" class="btn btn-success w-25">Update</button>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
    if(isset($_POST['editBtn'])){
        $fn = $_POST['fn'];
        $ln = $_POST['ln'];
        $email = $_POST['email'];
        $cn = $_POST['cn'];
        $status = $_POST['status'];
        $role = $_POST['role'];
        if($userAction->UpdateInfo($fn,$ln,$email,$cn,$role,$userId)){
            echo "<script>window.location.href='../View/dashboard.php';</script>";
        }
    }
    ?>
</body>
</html>