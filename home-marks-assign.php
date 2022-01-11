<!doctype html>
<html lang="en">

<head>
    <title>Assign Marks</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<style>
    .select-box {
        width: 40% !important;
    }
    footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
    }
</style>

<body>

    <?php
    session_start();
    include('php_functions/restrict_user.php');
    teacher();
    include('php_functions/db_connection.php');
    include('php_functions/php_query_functions.php');
    ?>
   <?php
include("php_script/navbar-teacher.php")

  ?>

    <div class="container mt-5">
        <div class="row mt-5 mb-5">
            <div class="col-sm-10 mx-auto mb-5">
                <div class="d-flex flex-row text-center justify-content-center align-items-center">
                    <div class="form-group select-box  mr-2">
                        <label for="">Courses</label>

                        <select class="form-control" name="" id="course">
                            <option value="dummy">Select</option>
                            <?php
                            $result = PullData($con, 'courses', '*', '', '');
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $row['course_id'] ?>"><?php echo $row['course_name'] ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <button type="button" onclick="get_student_list()" class="btn btn-primary my-auto">GENERATE</button>
                    </div>
                    
                </div>
    
                <div id="student-marks">

                </div>
           

            </div>

        </div>
    </div>
    <?php include('php_script/footer.php') ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php
    include('php_script/js_links.php')
    ?>
    <script>
        function maxLengthCheck(input) {
            value = Number(input.value)
            min = Number(input.min)
            max = Number(input.max)
            if (value < min) {
                alert('Sorry Your Lower Boundary Value is ' + min + " You Cannot Input value Lower than It")
                input.value = min;
            }
            if (value > max) {
                alert('Sorry Your Upper Boundary Value is ' + max + " You Cannot Input value Upper than It")
                input.value = max;
            }
        }

        function get_student_list() {
            var id = $('#course').val();
            if (id != 'dummy') {
                $.ajax({
                    type: "post",
                    url: "php_functions/curd_data_man.php",
                    data: {
                        action: 'student-list',
                        id: id
                    },
                    success: function(response) {
                        $('#student-marks').html(response);
                        $('.table').DataTable({ 
                      "destroy": true, //use for reinitialize datatable
                   });
                    }
                });
            }

        }
    </script>

</body>

</html>