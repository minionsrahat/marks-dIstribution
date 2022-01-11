<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
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
  session_start()
  ?>



  <div class="container">

    <hr>

    <div class="row">

      <div class="col-sm-4 mx-auto">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs ml-3">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Teacher</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">Director</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">EC</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane container active" id="home">
            <div class="card">
              <article class="card-body">
                <h4 class="card-title text-center mb-4 mt-1">Log In</h4>
                <hr>
                <h4 class="text-success text-center mb-3">Teacher</h4>
                <form action="php_functions/login.php" method="post">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                      </div>
                      <input name="username" class="form-control" placeholder="Email or login" type="text">
                    </div> <!-- input-group.// -->
                  </div> <!-- form-group// -->
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                      </div>
                      <input class="form-control" name="password" placeholder="******" type="password">
                      <input type="hidden" name="type" value="1">
                    </div> <!-- input-group.// -->
                  </div> <!-- form-group// -->
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block"> Login </button>
                  </div> <!-- form-group// -->
                  <p class="text-center"><a href="#" class="btn">Forgot password?</a></p>
                </form>
              </article>
            </div>

          </div>
          <div class="tab-pane container fade" id="menu1">
            <div class="card">
              <article class="card-body">
                <h4 class="card-title text-center mb-4 mt-1">Log In</h4>
                <hr>
                <h4 class="text-success text-center">Director/Chairman</h4>
                <form action="php_functions/login.php" method="post">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                      </div>
                      <input name="username" class="form-control" placeholder="Email or login" type="text">
                    </div> <!-- input-group.// -->
                  </div> <!-- form-group// -->
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                      </div>
                      <input class="form-control" name="password" placeholder="******" type="password">
                      <input type="hidden" name="type" value="2">
                    </div> <!-- input-group.// -->
                  </div> <!-- form-group// -->
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block"> Login </button>
                  </div> <!-- form-group// -->
                  <p class="text-center"><a href="#" class="btn">Forgot password?</a></p>
                </form>
              </article>
            </div>


          </div>
          <div class="tab-pane container fade" id="menu2">
            <div class="card">
              <article class="card-body">
                <h4 class="card-title text-center mb-4 mt-1">Log In</h4>
                <hr>
                <h4 class="text-success text-center">Exam Controller</h4>
                <form action="php_functions/login.php" method="post">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                      </div>
                      <input name="username" class="form-control" placeholder="Email or login" type="text">
                    </div> <!-- input-group.// -->
                  </div> <!-- form-group// -->
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                      </div>
                      <input class="form-control" name="password" placeholder="******" type="password">
                      <input type="hidden" name="type" value="3">
                    </div> <!-- input-group.// -->
                  </div> <!-- form-group// -->
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block"> Login </button>
                  </div> <!-- form-group// -->
                  <p class="text-center"><a href="#" class="btn">Forgot password?</a></p>
                </form>
              </article>
            </div>

          </div>
        </div>
        <?php
        if (isset($_SESSION['msg']['error'])) {
          if ($_SESSION['msg']['error']) {
        ?>
            <div class="alert alert-danger" role="alert">
              <strong>Invalid Username Or Password</strong>
            </div>

        <?php
            $_SESSION['msg']['error'] = false;
          }
        }

        ?>
           <!-- <div class="alert alert-danger" role="alert">
              <strong>Invalid Username Or Password</strong>
            </div> -->

      </div> <!-- col.// -->
    </div> <!-- row.// -->

  </div>




  <?php include('php_script/footer.php') ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
$(document).ready(function () {
  $('.alert').slideDown(1000)
});
 
</script>

</body>

</html>