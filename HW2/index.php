<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>HomeWork2</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="indexstyle.css">
</head>

<body>
  suadmin : suadmin1<br>
  admin : admin1<br>
  user : user1

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">User Role Login<br>Homework2</h5>
            <form class="form-signin" action="auth.php" method="POST" >
              <?php
                $errors = array( 1=>"Invalid user name or password, try again",
                                 2=>"please login to access this");

                $error_id = $_GET['err'];
                if ($error_id == 1)
                {
                  echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                }
                elseif ($error_id == 2)
                {
                  echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                }
              ?>
              <div class="form-label-group">
                <input type="text" id="username"  name="username" class="form-control" placeholder="User Name" required autofocus>
                <label for="username">User Name</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>