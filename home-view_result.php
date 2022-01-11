<!doctype html>
<html lang="en">

<head>
    <title>View Students Result</title>
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
    include('php_functions/db_connection.php');
    include('php_functions/restrict_user.php');
    director();
    include('php_functions/php_query_functions.php');
    ?>
    <?php
    include("php_script/navbar-teacher.php")

    ?>

    <div class="container mt-5 mb-5">
        <div class="row mt-5">
            <div class="col-sm-10 mx-auto">
                <div class="d-flex flex-row text-center justify-content-center align-items-center">
                    <div class="form-group select-box  mr-2">
                        <label for="">
                            <h4>Single Courses Wise Result</h4>
                        </label>

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
                    <div class="mt-4">
                        <button type="button" onclick="get_student_list()" class="btn btn-primary my-auto">GENERATE</button>
                    </div>

                </div>

                <div class="mx-auto text-center">
                    <button type="button" onclick="get_full_mark_sheet()" class="btn btn-primary">View Full Result Sheet</button>
                </div>
                <div id="student-marks">

                </div>


            </div>

        </div>
    </div>


    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send FeedBack</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Message</label>
                        <textarea class="form-control" name="" id="fmsg" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="send_feedback()" data-dismiss="modal" class="btn btn-primary">Send</button>
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
        function get_full_mark_sheet() {


            $.ajax({
                type: "post",
                url: "php_functions/curd_data_man.php",
                data: {
                    action3: 'view-student-mark-sheet',
                },
                success: function(response) {
                    $('#student-marks').html(response);
                    $('.table').DataTable({
                        "destroy": true, //use for reinitialize datatable
                    });
                }
            });


        }

        function send_feedback() {
            msg = $('#fmsg').val();
            if (msg != '') {
                $.ajax({
                    type: "post",
                    url: "php_functions/curd_data_man.php",
                    data: {
                        msg: msg
                    },
                    success: function(response) {

                    }
                });
            }

        }





        function get_student_list() {
            var id = $('#course').val();
            if (id != 'dummy') {
                $.ajax({
                    type: "post",
                    url: "php_functions/curd_data_man.php",
                    data: {
                        action2: 'view-student-list',
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