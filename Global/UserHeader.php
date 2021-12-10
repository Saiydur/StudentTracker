<div class="row mr-0">
        <div class="col-md-3 col-lg-2 pr-0">
            <div class="jumbotron jumbotron-fluid bg-light mb-0">
                <ul class="nav flex-column nav-link">
                    <li class="nav-item">
                        <a class="nav-link active" href="./dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./todolist.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Todo List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./uploadNotes.php"><i class="fa fa-sticky-note" aria-hidden="true"></i> Upload Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./uploadMarks.php"><i class="fa fa-sort-numeric-desc" aria-hidden="true"></i> Upload Marks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./postBlog.php"><i class="fa fa-book" aria-hidden="true"></i> Post Blog</a>
                    </li>
                    <?php if($_SESSION['role'] == 'admin'){
                    echo "<li class='nav-item'>
                        <a class='nav-link' href='./friends.php'><i class='fa fa-user-plus' aria-hidden='true'></i> See Users</a>
                    </li>";
                    }
                    ?>
                </ul>
            </div>
</div>