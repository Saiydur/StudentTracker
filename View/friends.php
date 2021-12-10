<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- bootstrapcdn -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Friend List</title>
</head>
<body>
<?php include('../Global/Header.php');
?>
        <div class="bg-light" id="container">
            <?php include('../Global/UserHeader.php'); ?>
            <div class="col-md-9 col-lg-10 pl-0 pr-0">
                <div class="jumbotron jumbotron-fluid bg-light mb-0 ">
                <div class="container">
                <?php
                    include '../Controller/friendsAction.php';
                    $frnds = new friendsAction();
                    $frnds->ShowAllFriends();
                ?>
                </div>
                </div>
            </div>
        </div>
        <script src='../src/script/uploadMarks.js'></script>
</body>
</html>