<?php
 $login = false;
 $showError = false;


if($_SERVER['REQUEST_METHOD']=="POST"){
    include 'connection.php';

    $email = $_POST["loginEmail"];
    $password = $_POST["loginpass"]; 
    
    // $sql = "Select * from user1 where user_email='$email' AND password='$password'";
     $sql= "SELECT * FROM `user1` WHERE user_email='$email'";
    
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    
    if ($num==1){
        
         $row=mysqli_fetch_assoc($result);

                   if(password_verify($password, $row['user_pass'])){
                     $login=true;
    
                    session_start();
                    $_SESSION['loggedin'] = true;
                      $_SESSION['sno'] = $row['sno'];
                    $_SESSION['useremail'] = $email;  
                    echo"logged in". $email;   
                   }      
                header("location: /tryProject/index.php");   
              
            }   
          
             header("location: /tryProject/index.php");   
        }
    
?>