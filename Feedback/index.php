<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Neosoft Feedback</title>
  </head>
  <body>
    <section>
    <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand"><img src="logo.png" alt="Neosoft Technologies" width="70" height="50"> NeoSOFT</a>
    <form class="form-inline">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><a href="login.php" class="text-secondary"><?php session_start(); if(isset($_SESSION['m'])) echo "Welcome ".$_SESSION['m']; else echo "Login";?></a></button>
    </form>
    </nav>
    </section>
    <section>
      <?php
      switch(@$_GET['con']){
        case "first": include('form.php');
        break;
        case "second": include('form2.php');
        break;
        case "third":include('form3.php');
        break;
        default:echo("<div class='mx-auto align-middle' style='width: 200px;margin-top:15%;'>
        <a href='?con=first'><button class='btn btn-success'>SUBMIT FEEDBACK</button>
        </div>");
      }
      ?>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>