<?php

include 'config.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    
    $sql="delete from `inventory` where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "Deleted Successfully";
    } else {
        die(mysqli_error($con));
    }
}
?>