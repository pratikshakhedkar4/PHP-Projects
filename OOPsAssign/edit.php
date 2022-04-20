
<?php
$conn=mysqli_connect("localhost","root","","TodoEmp");
if(!empty($_POST['editid']))
{
    $id=$_POST['editid'];
    $sel=mysqli_query($conn,"select * from Employee where id=$id");
    $data=mysqli_fetch_assoc($sel);
    if($data){
        echo json_encode($data);
    }
}
?>