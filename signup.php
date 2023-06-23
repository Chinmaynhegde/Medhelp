<?php
$user_id=$_POST['user_id'];
$email_id=$_POST['email_id'];
$password=$_POST['password'];


$conn = new mysqli("localhost","root","","signup");
if($conn->connect_error)
    {
        die("Failed to connect:".$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("insert into data(user_id,email_id,password) values(?,?,?)");
        $stmt->bind_param("sss",$user_id,$email_id,$password);
        $stmt->execute();
        echo"registered successfully";
        $stmt->close();
        $conn->close();
    } 
