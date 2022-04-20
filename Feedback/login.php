<?php
error_reporting(0);
session_start();
if(isset($_SESSION['m'])){
  header("location:index.php");
}
if(isset($_POST['submit'])){
  session_start();
  $user=$_POST['uname'];
  $pass=$_POST['pass'];
  if(empty($user) || empty($pass)){
    echo "<div class='alert alert-warning'>Plz fill empty field</div>";  
  }else{
      if($user!="test_user"){
        echo "<div class='alert  alert-warning'>Username is incorrect!!</div>";  
      }else if($pass!="123456")
      echo "<div class='alert alert-warning'>Password is incorrect!!</div>";  
      else {
        $_SESSION['m']=$user;
        header("location:index.php");  
      }
  }
  if($_POST['remember']){
    setcookie("uname",$user,time()+3600*24);
    setcookie("pass",$pass,time()+3600*24);
  }
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

    <title>Index page</title>
    <script>
      function cook(){
        if("<?php echo $_COOKIE['uname'];?>"!=undefined){
          if(document.getElementById('uname').value=="<?php echo $_COOKIE['uname'];?>"){
            document.getElementById('pass').value="<?php echo $_COOKIE['pass'];?>";
          }else
          document.getElementById('pass').value="";
        }
      }
    </script>
  </head>
  <body>
    <div class="container">
    <div class="jumbotron pt-4 mt-3">
        <h1>Login Panel</h1><hr py-2>
        <form method="POST">
            <div class="form-group">
                <label for="uname">Username</label>
                <input type="text" class="form-control" id="uname" name="uname" onchange="cook()">
            </div>
            <div id="err1" class="text-danger"></div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="pass" name="pass">
            </div>
            <div id="err1" class="text-danger"></div>
            <div class="form-check">
                <input class="form-check-input" id="remember" type="checkbox" name="remember">
                <label class="form-check-label">Remember Me</label>
                <hr py-2>
            </div>
            <div>
                <input type="submit" name="submit" class="btn btn-success" value="Login">
               
            </div>
        </form>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>