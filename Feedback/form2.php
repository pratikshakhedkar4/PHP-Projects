<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['m'])){
    header("location:login.php");
}
if(isset($_POST['sub'])){
    $status=$_POST['status'];
    $title=$_POST['title'];
    $review=$_POST['review'];
    $pros=$_POST['pros'];
    $cons=$_POST['cons'];
    $advice=$_POST['advice'];
    if(empty($status) || empty($title) || empty($review)|| empty($pros) || empty($cons) || empty($advice)){
        echo "<div class='alert alert-warning'>Plz fill empty field</div>";
    }else if(strlen($pros)<15 || strlen($pros)>200)
    echo "<div class='alert alert-warning'>Pros should contain minimum 15 and maximum 200 character.</div>";
    else if(strlen($cons)<15 || strlen($cons)>200)
    echo "<div class='alert alert-warning'>Cons should contain minimum 15 and maximum 200 character.</div>";
    else if(strlen($advice)<15 || strlen($advice)>200)
    echo "<div class='alert alert-warning'>Advice Management should contain minimum 15 and maximum 200 character.</div>";
    else{
    $_SESSION['status']=$status;
    $_SESSION['title']=$title;
    $_SESSION['review']=$review;
    $_SESSION['pros']=$pros;
    $_SESSION['cons']=$cons;
    $_SESSION['advice']=$advice;
   header("location:index.php?con=third");
    }
}
if(isset($_POST['pre'])){
    header("location:index.php?con=first");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Feedback</title>
    <style>
        .star {
            font-size: 20px;
        }

        .starFilled {
            color: orange;
        }
    </style>
  </head>
  <body>
    <form method="post"class="jumbotron container my-3">
        <ol start="3">
            <div class="form-group">
                <input type="hidden" name="rating" value="" id="rating">
                <lable><li>Overall rating</li></lable>
                <div>
                    <i class="far fa-star star" id="1"></i>
                    <i class="far fa-star star" id="2"></i>
                    <i class="far fa-star star" id="3"></i>
                    <i class="far fa-star star" id="4"></i>
                    <i class="far fa-star star" id="5"></i>
                </div>
            </div>
            <div class="form-group">
                <lable><li>Employee Status</li></lable>
                <select name="status" class="form-control w-75 my-2">
                    <option value="Full_Time" <?php if($status=="Full_Time") echo "selected";?>>Full Time</option>
                    <option value="Part_Time" <?php if($status=="Part_Time") echo "selected";?>>Part Time</option>
                    <option value="Contract" <?php if($status=="Contract") echo "selected";?>>Contract</option>
                    <option value="Intern" <?php if($status=="Intern") echo "selected";?>>Intern</option>
                </select>
            </div>
            <div class="form-group">
                <lable><li>Job title</li></lable>
                <input class="form-control w-75 my-2" id="title" name="title" type="text" value="<?php echo $title;?>" onblur="validate()">
            </div>
            <div id="err3" class="text-danger"></div>
            <div class="form-group">
                <lable><li>Review Headline</li></lable>
                <input class="form-control w-75 my-2" id="review" name="review" type="text" value="<?php echo $review;?>" onblur="validate()">
            </div>
            <div id="err4" class="text-danger"></div>
            <div class="form-group">
                <lable><li>Pros</li></lable>
                <textarea class="form-control w-75" id="pros" name="pros" rows="5" onblur="validate()"><?php echo $pros;?></textarea>
            </div>
            <div id="err5" class="text-danger"></div>
            <div class="form-group">
                <lable><li>Cons</li></lable>
                <textarea class="form-control w-75" id="cons" name="cons" rows="5" onblur="validate()"><?php echo $cons;?></textarea>
            </div>
            <div id="err6"class="text-danger"></div>
            <div class="form-group">
                <lable><li>Advice Management</li></lable>
                <textarea class="form-control w-75" id="advice" name="advice" rows="5" onblur="validate()"><?php echo $advice;?></textarea>
            </div>
            <div id="err7"class="text-danger"></div>
            <input type="submit" class="btn btn-primary float-left" value="PREVIOUS" name="pre">
            <input type="submit" class="btn btn-primary float-right" value="NEXT" name="sub">
            
        </ol>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $('.star').click(e => {

        $('.star').removeAttr("starFilled");
        fillStar(e.target.id);
        });

        function fillStar(ind) {
        var i = 0;
        for (i = 1; i <= parseInt(ind); i++) {
            $(`#${i}`).removeAttr("starFilled");
            $(`#${i}`).attr("class", "fas fa-star star starFilled");
        }
        $('#rating').val(parseInt(ind));
        }       
        function validate(){
            var e3=document.getElementById("err3");
            var e4=document.getElementById("err4");
            var e5=document.getElementById("err5");
            var e6=document.getElementById("err6");
            var e7=document.getElementById("err7");
            e3.innerHTML=e4.innerHTML=e5.innerHTML=e6.innerHTML=e7.innerHTML="";
            var title=document.getElementById('title').value;
            var review=document.getElementById('review').value;
            var pros=document.getElementById('pros').value;
            var cons=document.getElementById('cons').value;
            var advice=document.getElementById('advice').value;
            if(title==""){
            e3.innerHTML="Please Enter Job Title";
            document.getElementById('title').focus();
            }
            else if(review==""){
            e4.innerHTML="Please Enter Review Headline";
            document.getElementById('review').focus();
            }
            else if(pros==""){
            e5.innerHTML="Please Enter Pros";
            document.getElementById('pros').focus();
            }
            else if(pros.length<15 || pros.length>200){
            e5.innerHTML="Pros should contain at least 15 and maximum 200 characters";
            document.getElementById('pros').focus();
            }
            else if(cons==""){
            e6.innerHTML="Please Enter Cons";
            document.getElementById('cons').focus();
            }
            else if(cons.length<15 || cons.length>200){
            e6.innerHTML="Cons should contain at least 15 and maximum 200 characters";
            document.getElementById('cons').focus();
            }
            else if(advice==""){
            e7.innerHTML="Please Enter Advice Management";
            document.getElementById('advice').focus();
            }
            else if(advice.length<15 || advice.length>200){
            e7.innerHTML="Advice Management should contain at least 15 and maximum 200 characters";
            document.getElementById('advice').focus();
            }
        }
    </script>
    
  </body>
</html>