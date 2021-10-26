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
        <div class="col-md-9 col-lg-10 pl-0 pr-0">
            <div class="jumbotron jumbotron-fluid bg-light mb-0">
                <div class="container">
                <h1>This is Dashboard</h1>
                   <!--  Write Your Code From Here -->
























                   <body>
    <?php
include ('../Model/UserRegistration.php');

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
        if(!($password===$passwordConfirm)){
            $flag=0;
            $passwordConfirmErr="Password Dont Match";  
        }
    }

    if($flag==1)
    {
        $user = new UserInfo($firstName,$lastName,$email,$contactNo,$password);
        if($user->InsertDataToJSON()){
            $result = "Data Inserted Successfully";
        }
        else{
            $result = "Data Insertion Failed";
        }
    }
}
 
 if ($flag==1)//flag =1 so no invalid input. so all info can be hold in json.
  {
      //this fild is for json...
    if(isset($_POST["submit"]))  
    {
    if(file_exists('Registration.json'))
        {
            $current_data = file_get_contents('Registration.json');  //this registration named file is json file where file readed.
            $array_data = json_decode($current_data, true);  //json data decoding here. json decode and encode data so 1st decode and save data.
            $extra = array// giving data as array life set of data.
            (  
                 'firstName'               =>     $_POST['firstName'],
                 'lastname'          =>     $_POST["lastname"],
                 'email'          =>     $_POST["email"],
                 'phone'          =>     $_POST["phone"],  
                 'password'          =>     $_POST["password"],  
                 'passwordConfirmation'     =>     $_POST["passwordConfirmation"]  
                );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data);  //all data taken now time to encode..
            if(file_put_contents('Registration.json', $final_data))  
            {  
                 $message = "<label>Data Recorded Successfully</p>";  
            }  
        }  
        else  
        {  
           $error = 'JSON File not exits';  
        }  
    }
 }

//for data manupulation 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
 

    <div class="ep">
        <!--ep is for Edit profile-->
        <div class="left">

          
        </div>

        <div class="right">

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <!--after clicking submit btn this page will be loaded..-->

                <fieldset>
                    <legend><B>Edit profile</B></legend> <br>

                    <?php //include('../Controller/RegistrationAction.php');?>
        <div class="col-md-7 col-lg-6 ml-auto">
            <form action="" method="POST">
                    <!-- First Name -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div> 
                        <input value="<?php echo $firstName?>" id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md">
                        <div class="col-lg-12 text-danger"><?php echo $firstNameErr?></div>
                    </div>
                    <!-- Last Name -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input value="<?php echo $lastName?>" id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md">
                        <div class="col-lg-12 text-danger"><?php echo $lastNameErr?></div>
                    </div>

                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input value="<?php echo $email?>" id="email" type="text" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                        <div class="col-lg-12 text-danger"><?php echo $emailErr?></div>
                    </div>

                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                        <select id="countryCode" name="countryCode" style="max-width: 80px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                            <option value="+880">+880</option>
                            <option value="+02">+02</option>
                        </select>
                        <input value="<?php echo $contactNo?>" id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3">
                        <div class="col-lg-12 text-danger"><?php echo $contactNoErr?></div>
                    </div>
                    <!-- Password -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                        <div class="col-lg-12 text-danger"><?php echo $passwordErr?></div>
                    </div>
                    <!-- Password Confirmation -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="passwordConfirmation" type="text" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                        <div class="col-lg-12 text-danger"><?php echo $passwordConfirmErr?></div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" name="register" class="btn btn-info btn-block py-2">
                        <span class="font-weight-bold">Update</span>
                        </button>
                    </div>


                </fieldset>
            </form>



        </div>

    </div>



</body>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>