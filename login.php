<?php 
     session_start();
    include('db.php');
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport " content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/index.css">
  <title>Login page</title>
</head>
    <style type="text/css">
    .error{
    border: solid 5px red;
    background: red;
     } 
    </style>
<body>
  <div class="container">

    <form  method="post" id="form" action="#">
      <div class="form-content">
      <div class="login-form">
        <div class="title">Login</div>
        <div class="input-box">
          <input type="email" name="email" id="Email" placeholder="Enter your Email" required> 
          <div class="input-box"></div>
          <input type="password" name="password" id="Pasword" placeholder="Enter your password" required>

          <div class="button input-boxes">
            <input type="submit" >
          </div>

          <div class="text"><a href="./Forget Password.php">Forget Password?</a></div>
          <div class="text">Don't Have an account? <a href="./Register.php"> SignUp </a></div>
        </div>
      </form>
      
      </div>


 <?php
  

         if(
            isset($_POST['email'])&&
            isset($_POST['password']))
          {

               
              $email=$_POST['email'];
              $password=md5($_POST['password']);
               
             
         
        $sql2  = "SELECT * FROM `users` WHERE email='".$email."' AND password ='".$password."' AND email LIKE 'teacher%' ";
             

                $result = $conn->query($sql2);

               if($result->num_rows > 0){
                     
                     $row=$result->fetch_assoc();

                    $_SESSION['firstname']=$row['firstname'];
                    $_SESSION['secondname']=$row['secondname'];
                    $_SESSION['id']=$row['id'];
                    $_SESSION['email']=$row['email'];


                   header("location:Teacher.php");

               }else{

                   $sql3  = "SELECT * FROM `users` WHERE email='".$email."' AND password ='".$password."' AND email LIKE 'student%' ";
             
                   $result1 = $conn->query($sql3);

               if($result1->num_rows > 0){
                     
                     $row=$result1->fetch_assoc();

                    $_SESSION['firstname']=$row['firstname'];
                    $_SESSION['secondname']=$row['secondname'];
                    $_SESSION['id']=$row['id'];
                    $_SESSION['email']=$row['email'];

                   header("location:Student Dashboard.php");    
                  
               }
               else{
                 echo '<script>alert("User Not registered")</script>';

               }


              }
           }
            
         

        ?>


  
  
</body>


</html>