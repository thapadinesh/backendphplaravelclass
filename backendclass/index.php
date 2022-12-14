<?php 
require('config.php'); 
session_start();
// include('config.php'); 
//You can use both require or include.
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Students Record Management System</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <?php 
        if(isset($_SESSION['id']))
        {
          echo header('Location: dashboard.php?msg=already_loggedin');
        }
        if(isset($_POST['submit']))
        {
          $email = $_POST['email'];
          $password = md5($_POST['password']);

          $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
          $login_result = mysqli_query($conn,$login_query);
          $count = mysqli_num_rows($login_result);
          if($count==1)
          {
            $row = mysqli_fetch_assoc($login_result);
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];

            echo header('Location: dashboard.php?msg=login_success');
          }
          else 
          {
            echo "Login Failed.";
          }
        }
        ?>
      <h1>Login</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Email</label>
              <input type="email"
                class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password"
                class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            <button type="submit" name="submit"  class="btn btn-primary">Login</button>
        </form>
        Not Have an account yet, <a href="register.php">Register Now.</a>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>