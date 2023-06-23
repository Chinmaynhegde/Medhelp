<?php

// $host="localhost";
// $user="root";
// $password="";
// $db="demo";

// mysql_connect($host,$user,$password);
// mysql_select_db($db);

// if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['pass'];
    
    $con = new mysqli("localhost","root","","demo");

    if($con->connect_error)
    {
        die("Failed to connect:".$con->connect_error);
    }
    else{
        $stmt=$con->prepare("select * from loginform where user=?");
        $stmt->bind_param("s",$uname);
        $stmt->execute();
        $stmt_result= $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data=$stmt_result->fetch_assoc();
            if($data['pass'] === $password){
                // echo "<h2>Login successfully</h2>";
                echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUCCESS!</strong> you have logged in successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
            }
            else{
                echo "<h2>Invalid username or password</h2>";
                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong></strong>not able to login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
            }
            
        }
        else{
            echo "<h2>Invalid username or password</h2>";
        }
    }
    ?>
