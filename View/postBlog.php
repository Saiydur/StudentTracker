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
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Blog-Write</title>
</head>
<body>
<?php include('../Global/Header.php');?>
    <div class="bg-light">
        <?php include('../Global/UserHeader.php')?>
        <?php include('../Controller/PostBlogAction.php')?>
        <div class="col-md-9 col-lg-10 pl-0 pr-0">
            <div class="jumbotron jumbotron-fluid bg-light mb-0">
                <div class="container">
                <?php echo $result?>
                <h1>Share Your Mind:</h1><hr>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Title</h3>
                            <input class="form-control" type="text" name="postTitle" id="postTitle" placeholder="Enter Your Blog Title"><br>
                            <label class="text-danger"for=""><?php echo $postTitleErr?></label>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Categorey</h3>
                            <input class="form-control" type="text" name="postCat" id="postCategorey" placeholder="Enter categorey here use (,) for multiple categorey"><br>
                            <label class="text-danger" for=""><?php echo $postCatErr?></label>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Write Your Blog:</h3><br>
                            <label class="text-danger"for=""><?php echo $blogTextErr?></label>
                            <textarea name="blogText" id=""></textarea>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Tags</h3><br>
                            <label class="text-danger"for=""><?php echo $postTagsErr?></label>
                            <input class="form-control" type="text" name="postTags" id="postTitle" placeholder="Enter tags here use (,) for multiple tags">
                        </div>
                    </div><br>
                    <button class="btn btn-primary w-100" type="submit" name="postBlog">Post</button>
                </form>
                <script>
                    CKEDITOR.replace('blogText');
                </script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>