<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrapcdn -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Profile</title>
</head>
<body>
<?php include('../Global/Header.php')?>
    <div class="row">
        <div class="col-md-3 col-lg-2 ml-auto">
            <ul class="nav flex-column nav-link">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Upload Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Upload Marks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Post Blog</a>
                </li>
            </ul>
        </div>
        <div class="col-md-9 col-lg-10 ml-auto">
            <div class="jumbotron jumbotron-fluid bg-success">
                <div class="container">
                    <?php include('./todolist.php')?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>