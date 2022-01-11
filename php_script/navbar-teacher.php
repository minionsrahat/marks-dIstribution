<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="home-teacher.php">Institute Of Information Technology</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse py-2" id="collapsibleNavId">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item ">
                <a class="nav-link text-white" href="home-teacher.php">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="home-student-list.php">Student List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="home-course.php">Courses</a>
            </li>

            <?php
            if ($_SESSION['type'] == 2) {
            ?>

                <li class="nav-item text-white">
                    <a class="nav-link text-white" href="home-view_result.php">View-Result</a>
                </li>

            <?php
            } else if ($_SESSION['type'] == 1) {
            ?>

                <li class="nav-item">
                    <a class="nav-link text-white" href="home-marks-assign.php">Assign Marks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="home-feedback.php">Feedback</a>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="home-print-result.php">Print Result</a>
                </li>
            <?php
            }
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username'] ?></a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item " href="#">Profile</a>
                    <a class="dropdown-item " href="php_functions/logout.php">Log Out</a>
                </div>
            </li>
    </div>
</nav>