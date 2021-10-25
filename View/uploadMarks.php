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
    <title>Track Marks</title>
    <link rel="stylesheet" href="../src/CSS/marks.css">
</head>
<body>
<?php include('../Global/Header.php');
?>
        <div class="bg-light" id="container">
            <?php include('../Global/UserHeader.php'); ?>
            <div class="col-md-9 col-lg-10 pl-0 pr-0">
                <div class="jumbotron jumbotron-fluid bg-light mb-0">
                    <div class="container">
                    <h1>Track Your Marks</h1>
                    <!--  Write Your Code From Here -->
                    <div class="form-group mb-3 marks-institution-div">
                            <input type="text" class="form-control marks-institution-name-input" placeholder="Institution name" aria-label="Institution Name" aria-describedby="basic-addon2">
                        </div>

                        <div class="form-group mb-3 marks-semester-div">
                            <input type="text" class="form-control marks-semester-name-input" placeholder="Semester name" aria-label="Semester Name" aria-describedby="basic-addon2">
                        </div>

                        <div class="input-group form-group mb-3 marks-course-number-div">
                            <input type="number" class="form-control" id="marks-course-number-input" placeholder="How much courses did you take? (Enter a Number)" aria-label="Course Number" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" type="button" id='submit-course-number' onclick="courseNameCGPA()">Submit</button>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
        <script src='../script/uploadMarks.js'></script>
</body>
</html>