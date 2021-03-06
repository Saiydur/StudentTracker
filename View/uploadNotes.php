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
    <title>Upload Notes & Files</title>

    <link rel="stylesheet" href="../src/CSS/uploadNotes.css">
</head>
<body>
<?php include('../Global/Header.php'); ?>

        <div class="bg-light">
            <?php include('../Global/UserHeader.php'); ?>
            <div class="col-md-9 col-lg-10 pl-0 pr-0">
                <div class="jumbotron jumbotron-fluid bg-light mb-0">
                    <div class="container">
                        <div class="container">
                                <?php 
                                    if(isset($_GET['upload'])){
                                        if($_GET["upload"]=="error"){
                                            echo"<div class='alert alert-danger' role='alert'>
                                            Upload Failed!
                                          </div>";
                                        }
                                        else if($_GET["upload"]=="success"){
                                            echo"<div class='alert alert-success' role='alert'>
                                            Upload Successfully
                                          </div>";
                                        }
                                    }
                                ?>
                            <h1>Upload Notes and Files from One Place</h1>
                            <!--  Write Your Code From Here -->
                            <!-- <form action="" method="post"> -->
                                <div class="form-group note-file-files-div">
                                    <form action="uploadFile.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group mb-3 note-file-title-div">
                                        <input type="text" class="form-control note-file-title-input" placeholder="Note/File Title" aria-label="Note/File Title" aria-describedby="basic-addon2" name='title'>
                                        </div>
                                        <div class="form-group note-file-notes-div">
                                            <textarea class="form-control note-file-notes-input" id="exampleFormControlTextarea1" rows="3" placeholder="Take Notes..." name='textarea'></textarea>
                                        </div>
                                        <input type="file" class="form-control-file note-file-files-input" id="exampleFormControlFile" name='file'><br>
                                        <button class="btn btn-outline-primary" type="submit" name='submit'>Upload</button>
                                    </form>
                                </div>
                                <?php 
                                    if(isset($message)) {
                                        echo $message;
                                    }
                                ?>

                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>