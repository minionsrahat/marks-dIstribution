<!doctype html>
<html lang="en">

<head>
    <title>Submit-SuccessFul</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    body {
        height: 100%;
    }

    .heading {
        height: 100vh;
        width: 100%;


    }

    .content {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        text-align: center;


    }
    footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
    }

    .content h3 {
        font-size: 40px;
    }
</style>

<body>

    <?php
    session_start();
    include('php_functions/db_connection.php');
    include('php_functions/php_query_functions.php');
    ?>
    <?php
    include("php_script/navbar-teacher.php")

    ?>

    <div class="heading">
        <div class="content">
            <?php
            if (isset($_GET['type'])) {
                $course_id = $_GET['id'];
                $condition = array(
                    'course_id' => $course_id
                );
                $type = $_GET['type'];
                $to = ($type == '1') ? 'Director' : 'Exam Controller';
                $result = PullData($con, 'courses', "*", $condition, '');
                $row = mysqli_fetch_array($result);
                echo $con->error;
            }
            if ($_SESSION['type'] == 1) {
            ?>
                <h3 class="text-success">You Successfully Submit The Result Of <?php echo $row['course_name'] ?> Course To The <?php echo $to ?></h3>
                <a name="" id="" class="btn btn-primary mt-4" href="home-marks-assign.php" role="button">Back To Result Manipulation</a>
            <?php
            } else {
            ?>
 <h3 class="text-success">You Successfully Submit The Result To Exam Controller</h3>
            <?php
            }
            ?>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>