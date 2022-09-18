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
          $name = $_POST['name'];
          $email = $_POST['email'];
          $password = md5($_POST['password']);
          $confirm_password = md5($_POST['confirm_password']);

          if($password==$confirm_password)
          {
            $signup_query = "INSERT INTO users (name, email, password) VALUES('$name','$email','$password')";
            $signup_result = mysqli_query($conn,$signup_query);
            if($signup_result)
            {
              echo header('Location: index.php?msg=register_success');
            }
            else 
            {
              echo "Register Failed.";
            }
          }
          else 
          {
            echo "Both Password Doesn't Match.";
          }
        }
        ?>
      <h1>Register</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Name</label>
              <input type="name"
                class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
            </div>    
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
            <div class="form-group">
              <label for="">Confirm Password</label>
              <input type="password"
                class="form-control" name="confirm_password" id="" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            <button type="submit" name="submit"  class="btn btn-primary">Login</button>
        </form>
        Already Have an account, <a href="login.php">Login Now.</a>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>