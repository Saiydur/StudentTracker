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
    <script src="../src/script/app.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link rel="stylesheet" href="../src/CSS/Registration.css">
    <title>Registration</title>

    <style>
        .error{
            background-color: red;
            color: white;
            opacity: 0.6;
            text-align: center;
            border-radius: 5px;
            font-size: 25px;
        }
    </style>
</head>
<body>
    <!-- Navbar-->
    <?php include('../Global/Header.php');?>
    <!-- Left Image -->
<div class="container">

    <div class="row py-5 mt-4 align-items-center">
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Create an Account</h1>
        </div>
        <!-- Registeration Form -->
        <?php include('../Controller/RegistrationAction.php');?>
        <div class="col-md-7 col-lg-6 ml-auto">
            <form action="" method="POST">
                <div class="error">
                    <p><?php if(!empty($result)){echo $result;}?></p>
                </div>
                    <!-- First Name -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <em class="fa fa-user text-muted"></em>
                            </span>
                        </div> 
                        <input value="<?php echo $firstName?>" id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md">
                        <div class="col-lg-12 text-danger"><?php echo $firstNameErr?></div>
                    </div>
                    <!-- Last Name -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <em class="fa fa-user text-muted"></em>
                            </span>
                        </div>
                        <input value="<?php echo $lastName?>" id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md">
                        <div class="col-lg-12 text-danger"><?php echo $lastNameErr?></div>
                    </div>
                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <em class="fa fa-envelope text-muted"></em>
                            </span>
                        </div>
                        <input value="<?php echo $email?>" id="email" type="text" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                        <div class="col-lg-12 text-danger"><?php echo $emailErr?></div>
                    </div>
                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <em class="fa fa-phone-square text-muted"></em>
                            </span>
                        </div>
                        <select id="countryCode" name="countryCode" style="max-width: 80px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                            <option value="+880">880</option>
                            <option value="+02">02</option>
                        </select>
                        <input value="<?php echo $contactNo?>" id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3">
                        <div class="col-lg-12 text-danger"><?php echo $contactNoErr?></div>
                    </div>
                    <!-- Password -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <em class="fa fa-lock text-muted"></em>
                            </span>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                        <div class="col-lg-12 text-danger"><?php echo $passwordErr?></div>
                    </div>
                    <!-- Password Confirmation -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <em class="fa fa-lock text-muted"></em>
                            </span>
                        </div>
                        <input id="passwordConfirmation" type="text" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                        <div class="col-lg-12 text-danger"><?php echo $passwordConfirmErr?></div>
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" name="register" class="btn btn-info btn-block py-2">
                        <span class="font-weight-bold">Create your account</span>
                        </button>
                    </div>
                    <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>
                    <!-- Social Login -->
                    <div class="form-group col-lg-12 mx-auto">
                        <a href="#" class="btn btn-primary btn-block py-2 btn-facebook">
                            <i class="fa fa-facebook-f mr-2"></i>
                            <span class="font-weight-bold">Continue with Facebook</span>
                        </a>
                        <a href="#" class="btn btn-primary btn-block py-2 btn-twitter">
                            <i class="fa fa-twitter mr-2"></i>
                            <span class="font-weight-bold">Continue with Twitter</span>
                        </a>
                    </div>
                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Already Registered? <a href="LoginForm.php" class="text-primary ml-2">Login</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('../Global/SimpleFooter.php')?>
</body>
</html>