<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrapcdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Todo List</title>
</head>

<body>
    <?php include('../Global/Header.php');?>
    <div class="bg-light">
        <?php include('../Global/UserHeader.php')?>
        <div class="col-md-9 col-lg-10 pl-0 pr-0">
            <div class="jumbotron jumbotron-fluid bg-light mb-0">
                <div class="container">
                    <form action="" method="post">
                        <h1>Enter Your task</h1>
                        <input class="form-control" name="list[]" type="text" placeholder="Write Your Tasks" /><br>
                        <input class="form-control" name="list[]" type="text" placeholder="Write Your Tasks" /><br>
                        <input class="form-control" name="list[]" type="text" placeholder="Write Your Tasks" /><br>
                        <input class="form-control" name="list[]" type="text" placeholder="Write Your Tasks" /><br>
                        <input class="form-control" name="list[]" type="text" placeholder="Write Your Tasks" /><br>
                        <input class="btn btn-danger w-100 p-4 mb-4" type="submit" value="Add" name="Add">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
       if(isset($_POST['Add'])){
        if($_POST['list']!=null){
            echo"<h1>Task Here:</h1><br>";
            foreach($_POST['list'] as $list){
                echo"<h6>".$list."</h6><br>";
            }
        }
        else{
            echo"<h1>No list selected</h1>";
        }
    }
?>
</body>

</html>