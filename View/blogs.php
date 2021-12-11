<?php 
require_once("../Model/UserBlogPosts.php");
$blogs = new BlogPost("","","","","","");
?>
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
    <title>Blogs</title>
</head>
<body>
    <?php include('../Global/Header.php')?>
    <!-- Heading Section End Here -->
    <!-- Blog Section Start Here -->
    <section class="blog-section section-padding">
        <div class="container pt-4">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="blog-box">  
                                <?php if(!empty($blogs->GetAllBlogs())){
                                    foreach($blogs->GetAllBlogs() as $blog){    
                                        echo"<div class='blog-content'><div class='blog-title'>
                                        <h3><a href=''>{$blog['blogTitle']}</a></h3>
                                        </div>
                                        <div class='blog-meta'>
                                            <ul>
                                                <li><a href=''><i class='fa fa-user'></i> {$blog['userEmail']}</a></li>
                                                <li><a href=''><i class='fa fa-calendar'></i> {$blog['postingDate']}</a></li>
                                            </ul>
                                        </div>
                                        <div class='blog-text'>
                                            <p>{$blog['blogText']}
                                            </p>
                                        </div>
                                        <div class='blog-tags'>
                                            <ul>
                                                <li><a href='#'><i class='fa fa-tags' aria-hidden='true'></i> Tags:{$blog['blogTags']}</a></li>
                                                <li><a href='#'><i class='fa fa-shopping-bag' aria-hidden='true'></i> Catergorey:{$blog['blogCategories']}</a></li>
                                            </ul>
                                        </div>
                                    </div>";
                                    }
                                }
                                else{
                                    echo "<h1>No Data Found</h1>";
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>