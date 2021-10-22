<header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="../index.php">Student Tracker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../View/blogs.php">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../View/aboutUs.php">About Us</a>
                    </li>
                </ul>
                <div class="mx-4">
                <?php session_start(); if(!empty($_SESSION['email'])){
                        echo '<a class="btn btn-outline-info my-2 my-sm-0 " href="../Controller/LogOut.php">Logout</a>';
                    }
                    else{
                        echo '<a class="btn btn-outline-info my-2 my-sm-0 mx-2" href="../View/LoginForm.php">Login</a>';
                        echo '<a class="btn btn-outline-info mr-2 my-sm-0 mx-2" href="../View/Registration.php">Register</a>';
                    }
                    ?>
                </div>
            </div>
        </nav>
</header>