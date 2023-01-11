<?php
 
  include('db.php');
  session_start();

   if(isset($_POST['gradedata'])&&
      isset($_POST['examdata'])){
    
       $gradegiven=$_POST['gradedata'];
        
       $sql = "UPDATE `student_attempt_exam` SET `grade`='".$_POST['gradedata']."' WHERE exam_id = '".$_POST['examdata']."' " ;
     	$result=$conn->query($sql);

     	if($result===true){
     		echo $gradegiven;
     	}
   }
  ?>