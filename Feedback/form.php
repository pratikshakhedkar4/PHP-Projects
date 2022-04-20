<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['m'])){
  header("location:login.php");
}
if(isset($_POST['sub'])){
  $cf=$_POST['CorF'];
  $name=$_POST['ename'];
  if(empty($cf) || empty($name))
  echo "<div class='alert alert-warning'>Plz fill empty field</div>";
  else{
  $_SESSION['CorF']=$cf;
  $_SESSION['name']=$name;
  header("location:index.php?con=second");
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Feedback</title>
  </head>
  <body>
    <form method="POST" class="jumbotron container my-3">
        <h7 class="text-danger p-4">All Fields Are Required.</h7>
        <ol>
            <div class="form-group">
                <lable><li>Are you a current or former employee?</li></lable>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="current" name="CorF" id="current" onblur="validate()">
                <label class="form-check-label" for="current">Current</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="former" name="CorF" id="former" onblur="validate()">
                <label class="form-check-label" for="former">Former</label>
                </div>
                <div id="err1" class="text-danger"></div>
            </div>
            <div class="form-group">
                <lable><li>Employer's Name</li></lable>
                <input class="form-control w-75 my-2" type="text" id="ename" name="ename" value="<?php echo $ename;?>" onblur="validate()">
                <div id="err2" class="text-danger"></div>
            </div>
            <input type="submit" class="btn btn-primary float-right" name="sub" value="NEXT">
        </ol>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
      function validate(){
      var e1=document.getElementById('err1');
      var name=document.getElementById('ename').value;
      var e2=document.getElementById('err2');
      e1.innerHTML=e2.innerHTML="";
      var getSelectedValue = document.querySelector( 'input[name="CorF"]:checked');   
      if(getSelectedValue == null)   
              e1.innerHTML="Radio button is not selected";  
      else if(name==""){
        e2.innerHTML="Please Enter Name";
        document.getElementById('ename').focus();
      }
    }
    </script>
  </body>
</html>