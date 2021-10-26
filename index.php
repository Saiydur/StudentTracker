<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- bootstrapcdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- custom CSS -->
    <link rel="stylesheet" href="./src/CSS/index.css">
    <title>Student Tracker</title>
</head>

<body>
    <!-- Heading Section Start Here -->
    <header >
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Student Tracker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="View/blogs.php">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="View/aboutUs.php">About Us</a>
                    </li>
                </ul>
                <div class="mx-4">
                <?php session_start(); if(!empty($_SESSION['email'])){


                           echo '<a class="btn btn-outline-info my-2 my-sm-0 mr-2 " href="View/todolist.php">To Do List</a>';
                        echo '<a class="btn btn-outline-info my-2 my-sm-0 " href="Controller/LogOut.php">Logout</a>';
                      
                    }
                    else{
                        echo '<a class="btn btn-outline-info my-2 my-sm-0 mx-2" href="View/LoginForm.php">Login</a>';
                        echo '<a class="btn btn-outline-info mr-2 my-sm-0 mx-2" href="View/Registration.php">Register</a>';
                    }
                    ?>
                </div>
            </div>
        </nav>
    </header>
    <!-- Heading Section End Here -->
    
    <!-- Main Section Start Here -->
    <main class="">
        <div class="container py-2">
            <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="./src/Images/img1.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./src/Images/img1.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./src/Images/img1.png" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div>
            <div class="jumbotron bg-white">
                <h1 class="">Vision And Mission</h1>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum hic nulla dolor, vero
                    maxime optio! Laboriosam repellat repudiandae laudantium nam debitis cumque veritatis perferendis
                    asperiores commodi, pariatur rem expedita maxime libero ullam labore? Qui aut error a soluta numquam
                    obcaecati?</p>
                <hr class="my-2">
                <p class="lead">
                    <a class="btn btn-info btn-lg" href="./View/Registration.php" role="button">Use Now</a>
                </p>
            </div>
        </div>
    </main>
    <!-- Main Section End Here -->

    <!-- Footer Section Start Here -->
    <footer>
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Alpha Alliance
                        </h6>
                        <p>
                            Saiydur Rahman <br>
                            Abdullah Al Jaber <br>
                            Rafidur Rahman <br>
                            Safkat Jaman
                        </p>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">About Us</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Blogs</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Github</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contact
                        </h6>
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <p>Dhaka,Bangladesh</p>
                        <p>
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            contact@stracker.com
                        </p>
                        <p><i class="fa fa-fax" aria-hidden="true"></i> + 02-99999999</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i> + 8801999999</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="#">Alpha Alliance</a>
        </div>
    </footer>
    <!-- Footer Section End Here -->

    <!-- bootstrapcdn script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>