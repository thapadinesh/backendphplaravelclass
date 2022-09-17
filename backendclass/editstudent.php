<?php require('config.php'); ?>
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
<?php 
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $select_query = "SELECT * FROM students WHERE id=$id";
    $select_result = mysqli_query($conn,$select_query);
    $select_row = $select_result->fetch_assoc();
    // $select_row = mysqli_fetch_row($select_result);

}
?>
      <div class="container">
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Manage Students</a>
    <?php 
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $class = $_POST['class'];
        
        $update_query = "UPDATE students SET name='$name', address='$address', email='$email', phone='$phone', class='$class' WHERE id=$id";
        $update_result = mysqli_query($conn,$update_query);
        if($update_result)
        {
            echo header('Location: index.php?msg=usuccess');
        }
        else 
        {
            echo "Student Record can not be updated successfully.";
        }
    }
    ?>
      <h1>Edit Student Record</h1>
      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Name:</label>
          <input type="text"
            class="form-control" value="<?php echo $select_row['name']; ?>" name="name" id="" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">Help text</small>
        </div>
        <div class="form-group">
          <label for="">Address:</label>
          <input type="text"
            class="form-control" name="address" value="<?php echo $select_row['address']; ?>" id="" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">Help text</small>
        </div>
        <div class="form-group">
          <label for="">Email:</label>
          <input type="email"
            class="form-control" name="email" id="" value="<?php echo $select_row['email']; ?>" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">Help text</small>
        </div>
        <div class="form-group">
          <label for="">Phone:</label>
          <input type="text"
            class="form-control" name="phone" id="" value="<?php echo $select_row['phone']; ?>" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">Help text</small>
        </div>
        <div class="form-group">
          <label for="">Class:</label>
          <input type="text"
            class="form-control" name="class" id="" value="<?php echo $select_row['class']; ?>" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">Help text</small>
        </div>
        <input name="submit" id="" class="btn btn-primary" type="submit" value="Submit">
      </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>