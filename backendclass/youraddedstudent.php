<?php 
require('config.php');
require('secure_user.php');
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
        <a name="" id="" class="btn btn-primary mt-2" href="index.php" role="button">Manage Student</a>
        <a name="" id="" class="btn btn-secondary float-right mt-2" href="logout.php" role="button">Logout</a>
      <h1>Your Added Students Records</h1>
      <p><b>Logged in as <?php echo $_SESSION['name']; ?></b></p>
      <?php 
      if(isset($_GET['msg']))
      {
        $msg = $_GET['msg'];

        if($msg=='dsuccess')
        {
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Student Record Deleted Successfully.</strong> 
          </div>
          
          <script>
            $(".alert").alert();
          </script>
          <?php 
        }

        if($msg=='usuccess')
        {
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Student Record Updated Successfully.</strong> 
          </div>
          
          <script>
            $(".alert").alert();
          </script>
          <?php 
        }

        if($msg=='asuccess')
        {
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Student Record Added Successfully.</strong> 
          </div>
          
          <script>
            $(".alert").alert();
          </script>
          <?php 
        }

      }
      ?>
      <table class="table">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Class</th>
                <th>Added By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $user_id = $_SESSION['id'];
            $select_query = "SELECT * FROM students WHERE user_id=$user_id";
            $select_result = mysqli_query($conn,$select_query);
            $i = 0;
            while($data_row = mysqli_fetch_array($select_result))
            {
                $i++;
            ?>
            <tr>
                <td scope="row"><?php echo $i; ?></td>
                <td><?php echo $data_row['name']; ?></td>
                <td><?php echo $data_row['address']; ?></td>
                <td><?php echo $data_row['email']; ?></td>
                <td><?php echo $data_row['phone']; ?></td>
                <td><?php echo $data_row['class']; ?></td>
                <td>
                  <?php
                  if(isset($data_row['user_id']))
                  {
                    $user_id = $data_row['user_id'];
                    $user_query = "SELECT * FROM users WHERE id=$user_id";
                    $user_result = mysqli_query($conn,$user_query);
                    $user_row = $user_result->fetch_assoc();
                    echo $user_row['name'];
                  }
                  ?>
                </td>
                <td>
                  <a name="" id="" class="btn btn-primary btn-sm" href="editstudent.php?id=<?php echo $data_row['id']; ?>" role="button">Edit</a>
                  <a name="" id="" class="btn btn-danger btn-sm" href="deletestudent.php?id=<?php echo $data_row['id']; ?>" role="button">Delete</a>
                </td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Class</th>
                <th>Added By</th>
                <th>Action</th>
            </tr>
        </thead>
      </table>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>