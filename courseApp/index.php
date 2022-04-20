<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <a href="display.php" class="btn btn-warning float-right">View Enquiries</a><br><br>
        <h2 class="text-center bg-info text-white p-2">All Courses</h2>
        <div class="row ">
        <?php
        include("connection.php");
        $sel=mysqli_query($conn,"select * from course");
        if(mysqli_num_rows($sel)>0){
            while($arr=mysqli_fetch_assoc($sel)){
        ?>
        <div class="col-4">
        <div class="card m-2">
            <img class="card-img-top" src="<?=$arr['image']?>" alt="Card image cap" width="100" height="200">
            <div class="card-body">
                <h5 class="card-title"><?=$arr['title']?></h5><hr>
                <p class="card-text"><?=$arr['description']?></p>
                <a href="enquiry.php" class="btn btn-primary">Enquire</a>
            </div>
            </div>
        </div>
        <?php
            }
        }

        ?>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>