<!doctype html>
<html lang="en">

<head>
    <title>Print Result</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .content {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            align-content: center;
        }

        .container hr {
            font-size: 10px;
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
    </style>

</head>

<body>
    <?php



    session_start();
    include('php_functions/restrict_user.php');
    ec();
    include('php_functions/db_connection.php');
    include('php_functions/php_query_functions.php');
    ?>
    <?php
    include("php_script/navbar-teacher.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // $id = trim($id);
        $id = mysqli_real_escape_string($con, $id);
        $stmt = $con->prepare("SELECT * FROM `student_list` WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        // echo $id;
        $result = $stmt->get_result();
        if($result->num_rows === 0) exit('No rows');
        // $id = mysqli_real_escape_string($con, $id);
        // $id = htmlentities($id, ENT_QUOTES, $encoding = 'UTF-8');
        // $condition = array(
        //     'id' => $id
        // );
        // $result = PullData($con, 'student_list', '*', $condition, '');
        // $result = mysqli_fetch_array($result);
        $result=$result->fetch_assoc();
    
        $name = $result['name'];
        $roll = $result['roll'];
    } else {
        header('location:home-view_result.php');
    }

    ?>

    <div class="container mt-5">
        <div class="content">
            <h3>Student Name: <?php echo $name ?></h3>
            <h3>Student Roll: <?php echo $roll ?></h3>
            <?php
            $sql = "SELECT COUNT(cname) from (SELECT courses.course_name aS cname , student_marks.marks as marks FROM courses LEFT JOIN
          `student_marks` ON courses.course_id=student_marks.course_id AND student_marks.student_roll='$roll') as filrer_table
          WHERE filrer_table.marks is null OR filrer_table.marks<33";
            $result = $con->query($sql);
            $result = mysqli_fetch_array($result);
            $status = "";
            if ($result[0] > 0) {
                $status = 'Failed';
            ?>

                <h4>Result: <span class="badge badge-danger"><?php echo $status ?></span> </h4>
            <?php
            } else {
                $status = 'Passed';
            ?>
                <h4>Result: <span class="badge badge-success"><?php echo $status ?></span> </h4>
            <?php
            }
            ?>

        </div>
        <hr>
        <div class="row">

            <div class="col-sm-8 mx-auto">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Marks</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT courses.course_name aS cname , student_marks.marks as marks FROM courses LEFT JOIN
               `student_marks` ON courses.course_id=student_marks.course_id AND student_marks.student_roll='$roll'";
                        $result = $con->query($sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td scope="row"><?php echo $row['cname'] ?></td>
                                <td><?php echo $row['marks'] ?></td>
                                <td><?php
                                    $status = '';
                                    if ($row['marks'] == null) {
                                        $status = 'Absent';
                                    } elseif ($row['marks'] <= 33) {
                                        $status = 'Failed';
                                    } else {
                                        $status = 'Passed';
                                    }
                                    echo $status;
                                    ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="mx-auto text-center">
                    <button type="button" class="btn btn-primary">Print Result</button>
                </div>
            </div>

        </div>
    </div>


    <?php include('php_script/footer.php') ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>