<?php
 
  include('db.php');
  session_start();

   if(isset($_POST['Courseid'])&&
      isset($_POST['personid'])&&
      isset($_POST['message'])){

        $sql = "INSERT INTO `chats`( `Courseid`, `senderId`, `message`) VALUES ('".$_POST['Courseid']."','".$_POST['personid']."','".$_POST['message']."') " ;

          $conn->query($sql);

          echo $_POST['message'] ;

   }

 ?>