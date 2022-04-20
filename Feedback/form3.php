<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['m'])){
    header("location:login.php");
}
if(isset($_POST['sub'])){
    $agree=$_POST['agree'];
    $temp=$_FILES['file']['tmp_name'];
    $fname=$_FILES['file']['name'];
    $ext=pathinfo($fname,PATHINFO_EXTENSION);
    $fn="attach".rand()."-".time().".".$ext;
    $ext_array=['doc','pdf'];
    if(empty($fname) || empty($agree)){
        echo "<div class='alert alert-warning'>Plz fill empty field</div>";
   }else{
        if(!empty($temp)){
            if(in_array($ext,$ext_array)){
            $dest="upload/";
            if(move_uploaded_file($temp,$dest.$fn)){
                header("location:success.php");
            }else
            echo "<div class='alert alert-warning'>Error</div>";
            }
            else
            echo "<div class='alert alert-warning'>Only pdf and png files are allowed</div>";
        }else
        echo "<div class='alert alert-warning'>Please select file</div>";
    }
}
if(isset($_POST['pre'])){
    header("location:index.php?con=second");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Feedback</title>
  </head>
  <body>
    <form method="POST" class="jumbotron container my-3" enctype="multipart/form-data">
        <ol start="10">
        <label><li>Submit Proof</li></label>
        <div class="form-group">
        <input type="file" name="file" class="form-control-file" id="file" onblur="validate()">
        </div>
        <div id="err1" class="text-danger"></div>
        <div class="form-check my-3">
            <input type="checkbox" class="form-check-input" name="agree" id="agree" onblur="validate()">
            <label class="form-check-label" for="agree">Agree Terms and Condition</label>
        </div>
        <div id="err2" class="text-danger"></div>
        <input type="submit" class="btn btn-primary float-left" value="PREVIOUS" name="pre">
            <input type="submit" class="btn btn-primary float-right" value="SUBMIT" name="sub">
        </ol>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        function validate(){
            var file=document.getElementById('file');
            var e1=document.getElementById('err1');
            var e2=document.getElementById('err2');
            e1.innerHTML=e2.innerHTML="";
            var checkBox = document.getElementById("agree");
            if(file.files.length==0){
             e1.innerHTML="No file Selected";
             file.focus();
            }
            else if(checkBox.checked==false){
                e2.innerHTML="Agree Terms and condition";
                checkBox.focus();
            }

        }
    </script>
  </body>
</html>