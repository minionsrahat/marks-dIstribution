<!doctype html>
<html lang="en">

<head>
    <title>Courses</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-sm-10 mx-auto">
                <h4 class="text-center my-4">Course List</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sn</th>
                            <th>Course Code</th>
                            <th>Course Name</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $result = PullData($con, 'Courses', '*', '', '');
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td scope="row"><?php echo $row["course_id"] ?></td>
                                <td><?php echo $row["cr_code"] ?></td>
                                <td><?php echo $row["course_name"] ?></td>
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>