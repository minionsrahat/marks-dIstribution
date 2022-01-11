<!doctype html>
<html lang="en">

<head>
<?php
 session_start();
 if(!isset($_SESSION['username']))
 {
header('location:index.php');
 }
 $name='';
 if($_SESSION['type']==1)
 {
$name='Teacher';
 }
else if($_SESSION['type']==2)
 {
$name='Director';
 }
 else 
 {
$name='Exam-Controller';
 }
    ?>
    <title><?php echo $name ?>-Homepage</title>
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
        background-image: url('images/background-image.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;

    }
.overlay{
    background-color: #a4a4a4;
    height: 100vh;
    width: 100%;
    opacity: 0.3;
 
}
.content{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        text-align: center;  
        color: white;
   
}
.content h3{
    font-size: 40px;
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
    include('php_functions/db_connection.php');
    include('php_functions/php_query_functions.php');
    ?>
   <?php
include("php_script/navbar-teacher.php")

  ?>

    <div class="heading">
        <div class="overlay">
        </div>
        <div class="content">
        <h3>Welcome to Result Automation System Of Institute Of Information Technology</h3>
        </div>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include('php_script/footer.php') ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>