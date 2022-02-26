<?php

$showalert="false";
$showerror="false";
if($_SERVER['REQUEST_METHOD']=="POST"){
    include 'connection.php';
    $user_email=$_POST['signupemail'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    $existSql="SELECT * FROM `user1` where user_email='$user_email'";
    $result=mysqli_query($conn, $existSql);
    $numRows= mysqli_num_rows($result);

    if($numRows>0){
      $showerror=true;
    }
    else{
        if($password==$cpassword)
        {
            $hash= password_hash($password, PASSWORD_DEFAULT);
            $sql="INSERT INTO `user1` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
             $result=mysqli_query($conn, $sql);
                 if($result)
                 {
                //   $showalert=true;              
                   header("Location: /tryProject/index.php?signupsuccess=true");
                 exit;
                 }
        }
        else{
            $showerror="Password not match";

            echo '<div class="alert alert-warning" role="alert">
            Passwords do not match;
             </div>';
        }
    }
     header("Location: /tryProject/index.php?signupsuccess=false&error=$showerror");
    // if($showerror)
    // {
    // echo '<div class="alert alert-warning" role="alert">
    // Username Already Exist;
    // </div>';
    // }
  
}

?>