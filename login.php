<?php

    $user_id=$_POST['user_id'];
    $password=$_POST['password'];
    
    $con = new mysqli("localhost","root","","signup");

    if($con->connect_error)
    {
        die("Failed to connect:".$con->connect_error);
    }
    else{
        $stmt=$con->prepare("select * from data where user_id=?");
        $stmt->bind_param("s",$user_id);
        $stmt->execute();
        $stmt_result= $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data=$stmt_result->fetch_assoc();
            if($data['password'] === $password){
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