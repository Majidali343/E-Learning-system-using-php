
<?php 
session_start();
include('db.php');

 if(isset($_GET['courseid'])&&
     isset($_SESSION['id'])){

   $sql1 ="SELECT  `courseid` FROM `studentenrollcourse` WHERE courseid = '".$_GET['courseid']."' " ;
   
    $result =$conn->query($sql1);
  
         if( $result->num_rows > 0){

                   echo '<script>alert("course already registered")</script>';
           }else{

          $sql =" INSERT INTO `studentenrollcourse`( `student_id`, `courseid`) VALUES ('".$_SESSION['id']."','".$_GET['courseid']."') " ;

               $result1 =$conn->query($sql);
                            $id = $_GET['courseid'];
                 header("location:studentviewcourse.php?courseid={$id}");
             echo '<script>alert("course Successfully registered")</script>';
                

 

               }

  }

 ?>