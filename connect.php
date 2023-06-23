<?php
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$phoneno=$_POST['phoneno'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$past_medical_history=$_POST['past_medical_history'];
$present_medical_problem=$_POST['present_medical_problem'];
$gender=$_POST['gender'];

$conn = new mysqli("localhost","root","","appointment");
if($conn->connect_error)
    {
        die("Failed to connect:".$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("insert into register(firstname,lastname,email,phoneno,dob,address,city,state,past_medical_history,present_medical_problem,gender) values(?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssisssssss",$firstname,$lastname,$email,$phoneno,$dob,$address,$city,$state,$past_medical_history,$present_medical_problem,$gender);
        $stmt->execute();
        echo"registration successfull";
        $stmt->close();
        $conn->close();
    } 



?>