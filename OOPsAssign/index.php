<?php
include("EmployeeClass.php");
error_reporting(0);
$msg="";
$obj=new Employee();
if(isset($_POST['submit'])){
$username=$_POST['username'];
$email=$_POST['email'];
$name=$_POST['name'];
$age=$_POST['age'];
$city=$_POST['city'];
$image=$_FILES['image'];
if(empty($username)||empty($email)||empty($name)||empty($age)||empty($city)||empty($image)){
    $msg="All fields are required!";   
}
else{
    $msg=$obj->insert($username,$email,$name,$age,$city,$image);
    $username=$email=$name=$age=$city=$image="";
}
}
if(isset($_POST['update'])){
    $id=$_POST['hiddenid'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $city=$_POST['city'];
    $image=$_FILES['image'];
    if (empty($image['tmp_name']))
    $image="";
    if(empty($username)||empty($email)||empty($name)||empty($age)||empty($city)){
        $msg="All fields are required!";    
    }else{
        $msg=$obj->updateEmp($id,$username,$email,$name,$age,$city,$image);
        $username=$email=$name=$age=$city=$image="";
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding:0;
        }
    </style>
</head>
<body>
    <div class="row">
    <div class="col-3"></div>
    <div class="col-6 py-4">
        <?php if($msg) echo"
        <div class='alert alert-danger'>
            $msg
        </div>";?>
        <div class="card">
        <div class="card-header"><h5>Add Employee</h5></div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" id="myForm">
            <input type="hidden" id="hiddenid" name="hiddenid" value="">
            <div class="form-group">
                <label for="username" >Username:</label>
                <input type="text" id="username" name="username" value="<?=$username?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="email" >Email:</label>
                <input type="email" id="email" name="email" value="<?=$email?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="name" >Name:</label>
                <input type="text" id="name"  name="name" value="<?=$name?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="age" >Age:</label>
                <input type="number" id="age"  name="age" value="<?=$age?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="city" >City:</label>
                <input type="text" id="city"  name="city" value="<?=$city?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <div id="uploadedimage"></div>
                <input type="file" id="image" name="image" class="form-control-file mt-2">
            </div>
        </div>
        <div class="card-footer">
        <button type="submit" name="submit" id="mybtn" class="btn btn-success">ADD</button>
        <button type="submit" name="update" id="myedit" class="btn btn-success">UPDATE</button>
        </div>
        </form>
        </div>
    </div>
    <div class="col-4"></div>
    </div>
    <div class="container" id="emptable">
    <table class="table table-striped table-hover table-bordered" >
        <tr>
            <th>SR.NO.</th>
            <th>Username</th>
            <th>Email</th>
            <th>Name</th>
            <th>Age</th>
            <th>City</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php
        $row=$obj->showdata();
        if($row=='0')
        echo "<tr><td align='center' colspan=8>No Record Found.</td></tr>";
        else{
            $sn=1;
            while($arr=mysqli_fetch_assoc($row)){
        ?>
        <tr>
            <td><?=$sn?></td>
            <td><?=$arr['username']?></td>
            <td><?=$arr['email']?></td>
            <td><?=$arr['name']?></td>
            <td><?=$arr['age']?></td>
            <td><?=$arr['city']?></td>
            <td><img src="<?=$arr['image']?>" width=50 height=50></td>
            <td>
            <a href="javascript:void(0)" class="btn btn-primary edit" data-id="<?= $arr['id'];?>">Edit</a>
            <a href="javascript:void(0)" class="btn btn-danger delete" data-delid="<?= $arr['id'];?>">Delete</a>
            </td>
        </tr>
        <?php $sn++; }}?>
    </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myedit").hide();
            $(document).on("click",".delete",function(){
                var listId=$(this).data("delid");
                $.ajax('ajax_delete.php',{
                    type:"POST",
                    data:{listId:listId},
                    success:function(data){
                        $("#emptable").load(document.URL +' #emptable');
                    }
                });
            })
            $(document).on("click",".edit",function(){
                $("#myedit").show();
                $("#mybtn").hide();
                var id=$(this).data('id');
               
                $.ajax("edit.php",{
                    type:"post",
                    data:{editid:id},
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        $("#hiddenid").val(data.id);
                        $("#username").val(data.username);
                        $("#email").val(data.email);
                        $("#name").val(data.name);
                        $("#age").val(data.age);
                        $("#city").val(data.city);
                        $("#imagepath").val(data.image);
                        $("#uploadedimage").html("<img src="+data.image+" width=80 height=80>");
                    }
                })
           
        })
        })
    </script>
</body>
</html>