<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<style>
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
    include('php_functions/php_query_functions.php');
    ?>
      <?php
include("php_script/navbar-teacher.php")

  ?>

    <div class="container mt-5 mb-5">
        <div class="row mt-5">
            <div class="col-sm-10 mx-auto">
                <h4 class="text-center my-4">Student List</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sn</th>
                            <th>Roll</th>
                            <th>Student Name</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $result = PullData($con, 'student_list', '*', '', '');
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td scope="row"><?php echo $row["id"] ?></td>
                                <td><?php echo $row["roll"] ?></td>
                                <td><?php echo $row["name"] ?></td>
                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <?php include('php_script/footer.php') ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include('php_script/footer.php') ?>
   <?php
include('php_script/js_links.php')
   ?>

    <script>
    $(document).ready( function () {
    $('.table').DataTable();
} );
    </script>
</body>

</html>