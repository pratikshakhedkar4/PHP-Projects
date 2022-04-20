<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['m'])){
    header("location:login.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Thank you</title>
  </head>
  <body>
    <div class="jumbotron">
        <h2 class="alert alert-success">Feedback Submitted Successfully!!!</h2>
        <h4>Thank You!!</h4>
        <h4>Click Here to <a href="logout.php">Logout</a></h4>
        <hr py-2>
        <table class="table table-bordered table-striped table-hover">
          <tr>
            <td>Are you a current or former employee?</td>
            <td><?php echo $_SESSION['CorF'];?></td>
          </tr>
          <tr>
            <td>Employer's Name</td>
            <td><?php echo $_SESSION['name'];?></td>
          </tr>
          <tr>
            <td>Employment Status</td>
            <td><?php echo $_SESSION['status'];?></td>
          </tr>
          <tr>
            <td>Job Title</td>
            <td><?php echo $_SESSION['title'];?></td>
          </tr>
          <tr>
            <td>Review Headline</td>
            <td><?php echo $_SESSION['review'];?></td>
          </tr>
          <tr>
            <td>Pros</td>
            <td><?php echo $_SESSION['pros'];?></td>
          </tr>
          <tr>
            <td>Cons</td>
            <td><?php echo $_SESSION['cons'];?></td>
          </tr>
          <tr>
            <td>Advice Management</td>
            <td><?php echo $_SESSION['advice'];?></td>
          </tr>
        </table>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>