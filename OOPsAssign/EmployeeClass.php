<?php
class Employee{
    private $conn;
    function __construct()
    {
        $this->conn=mysqli_connect("localhost","root","","TodoEmp") or die("Not Connected");
    }
    function showdata(){
        $query=mysqli_query($this->conn,"select * from Employee");
        if(mysqli_num_rows($query)>0){
        return $query;
        }else
        return 0;
    }
    function insert($username,$email,$name,$age,$city,$image){
        
        $temp=$image['tmp_name'];
        $fname=$image['name'];
        $ext=pathinfo($fname,PATHINFO_EXTENSION);
        $arr=['jpg','jpeg','png'];
        $fn=$email.rand().".$ext";
        if(!empty($temp)){
            if(in_array($ext,$arr)){
                $dest="upload/$fn";
                if(move_uploaded_file($temp,$dest)){
                    $q=mysqli_query($this->conn,"insert into Employee(username,email,name,age,city,image) values('$username','$email','$name','$age','$city','$dest')");
                    if(!$q){
                     return "Username and Email Id should be unique!";   
                    }else{
                        echo "<div class='alert alert-success'>Added!</div>";
                    }
                }
            }else{
                return "Only JPG,JPGE and PNG Files are allowed.";
            }
        }else{
            return "Please Select image.";
        }
    }
    function updateEmp($id,$username,$email,$name,$age,$city,$image=""){
        if(!empty($image)){
        $temp=$image['tmp_name'];
        $fname=$image['name'];
        $ext=pathinfo($fname,PATHINFO_EXTENSION);
        $arr=['jpg','jpeg','png'];
        $fn=$email.rand().".$ext";
        if($temp){
            if(in_array($ext,$arr)){
                $dest="upload/$fn";
                if(move_uploaded_file($temp,$dest)){
                    $q=mysqli_query($this->conn,"update Employee set username='$username',email='$email',name='$name',age='$age',city='$city',image='$dest' where id='$id'");
                    if(!$q){
                     return mysqli_error($this->conn);   
                    }else{
                        return "UPDATED!!";
                    }
                }
            }else{
                return "Only JPG,JPGE and PNG Files are allowed.";
            }
        }else{
            return "Please Select file!";
        }
        
        }else{
            $q=mysqli_query($this->conn,"update Employee set username='$username',email='$email',name='$name',age='$age',city='$city' where id='$id'");
                    if(!$q){
                     return mysqli_error($this->conn);   
                    }else{
                        return "UPDATED!!";
                    }
        }
    }
    function edit($Id){
        if(!empty($Id))
        {
            $sel=mysqli_query($this->conn,"select * from Employee where id=$Id");
            $data=mysqli_fetch_assoc($sel);
            if($data){
                echo json_encode($data);
            }
        }
    }
    function delete($eid){
        if(!empty($eid))
        mysqli_query($this->conn,"delete from Employee where id='$eid'");

    }
    function __destruct()
    {
        mysqli_close($this->conn);
    }
}
?>