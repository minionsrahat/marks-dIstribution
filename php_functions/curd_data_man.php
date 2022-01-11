<?php
include('db_connection.php');
include('php_query_functions.php');
session_start();
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'student-list') {
        $id = $_POST['id'];
        if(in_array($id,array(1,2,3,4)))
        {
        $sql = "SELECT student_list.id as id,student_list.roll as roll,student_list.name as name ,student_marks.marks as marks ,course_name from student_list left JOIN student_marks on student_list.roll=student_marks.student_roll and student_marks.course_id='$id'
         left join courses on courses.course_id='$id' GROUP by student_list.roll ORDER BY student_list.id";
        $result = $con->query($sql);
        echo $con->error;

?>
        <form action="php_functions/curd_data_man.php" method="post">
            <input type="hidden" name="course_id" value=<?php echo $id ?>>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Roll</th>
                        <th>Student Name</th>
                        <th>Course Name</th>
                        <th>Marks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td scope="row"><?php echo $row["id"] ?></td>
                            <td><?php echo $row["roll"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["course_name"] ?></td>
                            <td> <input oninput="maxLengthCheck(this)" type="number" value="<?php echo $row["marks"] ?>" name="marks[<?php echo $row["id"] ?>]" min='0' max='100'></td>
                        </tr>



                    <?php
                    }
                    ?>

                </tbody>
            </table>
            <div class="mx-auto text-center mb-5">
                <button type="submit" class="btn btn-primary">Submit Result To the Director</button>
            </div>
        </form>
    <?php
        }
    }
} elseif (isset($_POST['marks'])) {
    $marks = $_POST['marks'];
    $course_id = $_POST['course_id'];
    $list = PullData($con, 'student_list', '*', '', '');
    while ($row = mysqli_fetch_array($list)) {
        $id = $row['id'];
        $name = $row['name'];
        $roll = $row['roll'];
        $single_mark = ($marks[$id] == null) ? Null : $marks[$id];
        $query = "INSERT INTO student_marks
        (student_marks.id,student_marks.student_roll,student_marks.course_id,student_marks.marks)
      VALUES
        (null,'$roll',$course_id,$single_mark)
      ON DUPLICATE KEY UPDATE
          student_marks.marks=VALUES(student_marks.marks)";
        $result = $con->query($query);
        if ($result) {
            echo "SUCCESS";
        }
    }
    header('location:../home-successfull.php?id=' . $course_id . '&type=' . '1');
} elseif (isset($_POST['action2'])) {
    if ($_POST['action2'] == 'view-student-list') {
        $id = $_POST['id'];
        if(in_array($id,array(1,2,3,4)))
        {
        $sql = "SELECT student_list.id as id,student_list.roll as roll,student_list.name as name ,student_marks.marks as marks ,course_name from student_list left JOIN student_marks on student_list.roll=student_marks.student_roll and student_marks.course_id='$id'
         left join courses on courses.course_id='$id' GROUP by student_list.roll ORDER BY student_list.id";
        $result = $con->query($sql);


    ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Roll</th>
                    <th>Student Name</th>
                    <th>Course Name</th>
                    <th>Marks</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td scope="row"><?php echo $row["id"] ?></td>
                        <td><?php echo $row["roll"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["course_name"] ?></td>
                        <td><?php echo $row["marks"] ?></td>
                        <td><?php
                            if ($row['marks'] == null) {
                                echo 'Not Assign';
                            } else if ($row['marks'] < 33) {
                                echo 'Failed';
                            } else {
                                echo 'Pass';
                            }
                            ?></td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
        <?php
        if ($_SESSION['type'] == 2) {
        ?>
            <div class="mx-auto text-center mb-5">
                <button type="button" id='feedback' data-toggle="modal" data-target="#modelId" class="btn btn-primary mr-2">Feedback</button>
                <a name="" id="" class="btn btn-primary" href="home-successfull.php" role="button">Approve Result And Deliver It To the Exam-Controller</a>

            </div>
        <?php
        }
        ?>


    <?php
        }
    }
} elseif (isset($_POST['marks'])) {
    $marks = $_POST['marks'];
    $course_id = $_POST['course_id'];
    $list = PullData($con, 'student_list', '*', '', '');
    while ($row = mysqli_fetch_array($list)) {
        $id = $row['id'];
        $name = $row['name'];
        $roll = $row['roll'];
        $single_mark = ($marks[$id] == null) ? Null : $marks[$id];
        $query = "INSERT INTO student_marks
        (student_marks.id,student_marks.student_roll,student_marks.course_id,student_marks.marks)
      VALUES
        (null,'$roll',$course_id,$single_mark)
      ON DUPLICATE KEY UPDATE
          student_marks.marks=VALUES(student_marks.marks)";
        $result = $con->query($query);
        if ($result) {
            echo "SUCCESS";
        }
    }
    header('location:../home-successfull.php?id=' . $course_id . '&type=' . '1');
} elseif (isset($_POST['action3'])) {
    if ($_POST['action3'] == 'view-student-mark-sheet') {
        $list = PullData($con, 'student_list', "*", '', '');
        $course = PullData($con, 'courses', "*", '', '');
    ?>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Roll</th>
                    <?php
                    while ($row = mysqli_fetch_array($course)) {
                    ?>
                        <th><?php echo $row['course_name'] ?></th>
                    <?php
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($list)) {
                ?>
                    <tr>
                        <td scope="row"><?php echo $row["id"] ?></td>
                        <td><?php echo $row["roll"] ?></td>
                        <?php
                        $roll = $row['roll'];
                        $cwr = "SELECT courses.course_name as cname , student_marks.marks as marks FROM courses LEFT JOIN
                       `student_marks` ON courses.course_id=student_marks.course_id AND student_marks.student_roll='$roll'";
                        $cwr = $con->query($cwr);

                        while ($row2 = mysqli_fetch_array($cwr)) {
                        ?>
                            <td><?php echo ($row2['marks'] == null) ? 'Not Assign' : $row2['marks'] ?></td>
                        <?php
                        }

                        ?>

                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
        <?php
        if ($_SESSION['type'] == 2) {
        ?>
            <div class="mx-auto text-center mb-5">
                <button type="button" id='feedback' data-toggle="modal" data-target="#modelId" class="btn btn-primary mr-2">Feedback</button>
                <a name="" id="" class="btn btn-primary" href="home-successfull.php" role="button">Approve Result And Deliver It To the Exam-Controller</a>

            </div>
        <?php
        }
        ?>


    <?php
    }
} elseif (isset($_POST['action4'])) {
    if ($_POST['action4'] == 'view-student-mark-sheet') {
        $list = PullData($con, 'student_list', "*", '', '');
        $course = PullData($con, 'courses', "*", '', '');



    ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Roll</th>
                    <?php
                    while ($row = mysqli_fetch_array($course)) {
                    ?>
                        <th><?php echo $row['course_name'] ?></th>
                    <?php
                    }
                    ?>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($list)) {
                ?>
                    <tr>
                        <td scope="row"><?php echo $row["id"] ?></td>
                        <td><?php echo $row["roll"] ?></td>
                        <?php
                        $roll = $row['roll'];
                        $cwr = "SELECT courses.course_name as cname , student_marks.marks as marks FROM courses LEFT JOIN
                       `student_marks` ON courses.course_id=student_marks.course_id AND student_marks.student_roll='$roll'";
                        $cwr = $con->query($cwr);

                        while ($row2 = mysqli_fetch_array($cwr)) {
                        ?>
                            <td><?php echo ($row2['marks'] == null) ? 'Absent' : $row2['marks'] ?></td>
                        <?php
                        }

                        ?>
                        <td> <a name="" id="" class="btn btn-primary" href="home-single-marksheet.php?id=<?php echo $row["id"] ?>" role="button"><i class=" fa fa-print" aria-hidden="true"><b>Print</b></i></a></td>

                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>

<?php
    }
} else if (isset($_POST['msg'])) {
    $msg = $_POST['msg'];
   
    // $un=$_SESSION['username'];
    // $date=date('Y-m-d H:i:s');
    // $sql="INSERT INTO `feedbacks`(`id`, `from_user_name`, `msg`, `time`) VALUES (NULL,'$un' ,'$msg','$date')";
    // $result=$con->query($sql);


    $columns = array(
        'id', 'from_user_name', 'msg', 'time'
    );
    $values = array(null, '' . $_SESSION['username'], '' . $msg, '' . date('Y-m-d H:i:s'));
    PushData($con, 'feedbacks', $columns, $values);
}

?>