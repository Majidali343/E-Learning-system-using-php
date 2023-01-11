<?php 
    include('db.php');
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Register.css">
    <title>Register</title>

</head>

<body>
    <div class="container"  >
        <form action="#" method="post" >
            <div class="form-content">
                <div class="login-form">
                    <div class="title"> Create an Account</div>
                    <div class="input-box">
                        <input type="Name" name="firstname" placeholder="Enter your First Name" required>
                        
                        <div class="input-box"></div>
                        <input type="Name" name="secondname" placeholder="Enter your Last Name" required>

                        <div class="input-box"></div>
                        <input type="email" name="email" placeholder="Enter your Email" required>
                        
                        <div class="input-box"></div>
                        <input type="password" name="password" placeholder="Enter your password" required>

                        <div class="input-box"></div>
                        <input type="password"  placeholder="Enter Confirm password" required>

                        <div class="button input-boxes">
                            <input type="submit" >
                        </div>

                        <div class="text">Already Have an Account? <a href="./login.php"> Login </a></div>
                    </div>
        </form>

      <?php
  


            
         if(isset($_POST['firstname'])&&
            isset($_POST['secondname'])&&
            isset($_POST['email'])&&
            isset($_POST['password']))
          {
             $firstname=$_POST['firstname'];
              $secondname=$_POST['secondname'];
              $email=$_POST['email'];
              $password=md5($_POST['password']);

               $sql1="SELECT * FROM `users` WHERE email='".$email."'";

 

               $check = $conn->query($sql1);

               if($check->num_rows > 0){

                   echo '<script>alert("Email already registered")</script>';

               }else{
               
               $sql = "INSERT INTO `users`( `firstname`, `secondname`, `email`, `password`) VALUES ('".$firstname."','".$secondname."','".$email."','".$password."')";

               // if (mysqli_query($conn, $sql)) {
                       
               //     header("location:index.php");


             if ($conn->query($sql) === TRUE) {
                  echo "new record added"; 

                   header("location:login.php");
 
                    } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    mysqli_close($conn);
          }
                   
                  
               }

             


        ?>




    </div>

</body>

</html>


