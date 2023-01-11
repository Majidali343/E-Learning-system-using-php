<?php 
     session_start();
    include('db.php');
   
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="./css/checkCourse.css">
    <title>View course</title>
</head>
<div class="side-bar">
  <div class="logo-name">
      <h1>View Course</h1>
  </div>
  <ul>
            <li><a href="./Student Dashboard.php">Home</a></li>
            <li><a href="./studentregisteredcourses.php">View Courses</a></li>
            <li><a href="./Student Profile.php">My Profile</a></li>
            <li><a href="./studentchat.php?Queriesid=<?php echo $_GET['courseid']?>">Course Queries</a></li>
            <li><a href="./logout.php">Logout</a></li>
  </ul>
</div>

<div class="container">
  <div class="header">
    <h5>E - Learning Website</h5>
      <div class="user">
          <?php echo $_SESSION['firstname'], "&nbsp",$_SESSION['secondname']; ?>
      </div>
  </div>


  <div class="content">
 
  <?php
       $sql3 =" SELECT `grade` FROM `student_attempt_exam` WHERE courseid = ".$_GET['courseid']." && studentid = '".$_SESSION['id']."' ";
            $result = $conn->query($sql3);
               
            $row = $result->fetch_assoc() ;

            if($row == false){
                echo "<h3> GRADE : Not yet graded </h3>" ;
            }else
            {
              echo "<h3> GRADE :  '" .$row['grade'] ."'</h3>" ;
            }
          ?>
<?php 
            
               $sql=" SELECT  `module_week`, `module_video`, `module_name`, `module_description`, `courseid` FROM `course_modules` WHERE courseid='".$_GET['courseid']."' ";

                $result = $conn->query($sql);

               if($result->num_rows > 0){
               
            while($row = $result->fetch_assoc()) {

         ?>
             
          <h1><?php echo $row['module_week'] ?></h1>
          <video src="<?php echo $row['module_video'] ?>" width="1000" height="340" controls>
           </video>
           <h2>
             <?php echo $row['module_name'] ?>
           </h2>
           <p>
              <?php echo $row['module_description']?>
           </p>
         
         <br>

            <?php  
                }
               }

             ?>

     <div id="down">

        <h2>Download paper: </h2>
        <?php  
             
             $sql1= "SELECT  `examfile` FROM `teacheruploadexam` WHERE course_id ='".$_GET['courseid']."' " ;
             $result=$conn->query($sql1);
            
              if($result->num_rows > 0){
               $row = $result->fetch_assoc() ;
                ?>
               <a id="download" name="download" href="<?php echo "http://localhost/mb/".$row['examfile'] ?>" >Download!</a>
              
              <?php 
             }

        ?>
         

     </div>
     

       <form method="post" action="#" enctype="multipart/form-data">

        <label for="pdffile"><h2>Upload solved paper: </h2></label>
        
        <input type="file" id="pdffile" name="pdffile" required> 
       
        
        <Button type="submit" class="align"> Save </Button> 
      
     </form>

     <?php 

       if(isset($_FILES['pdffile'])){

        $location="exams/".$_FILES['pdffile']['name'];
         $tempname=$_FILES['pdffile']['tmp_name'];
    
         

         // Select file type
       $extension = strtolower(pathinfo($location,PATHINFO_EXTENSION));
         
       // Valid file extensions
       $extensions_arr = array("pdf" ,"word");

       // Check extension
       
       $sql1= " SELECT * FROM `student_attempt_exam` WHERE courseid='".$_GET['courseid']."' " ;
         $result = $conn->query($sql1);
            if($result->num_rows > 0){
              echo '<script>alert("Exam uploaded click update button to update")</script>';
            }else{

            if( in_array($extension,$extensions_arr)){
          move_uploaded_file($tempname,$location);
         $sql2= " SELECT  `teacher_id` FROM `teacheraddcourse` WHERE courseid ='".$_GET['courseid']."'" ;

         $result2=$conn->query($sql2);
         $row =$result2->fetch_assoc();

          $sql ="INSERT INTO `student_attempt_exam` ( `attempfile`, `courseid`, `studentid` ,`teacherid`) VALUES ('".$location."','".$_GET['courseid']."','".$_SESSION['id']."' ,'".$row['teacher_id']."') " ;

            $conn->query($sql);
     
       }else{
         echo '<script>alert("upload exam in pdf format")</script>';
       }

       
       }
    }

      ?>     

      <form method="post" action="#" enctype="multipart/form-data">

        <label for="Pdffile"><h2>Update exam paper: </h2></label>
        
        <input type="file" id="Pdffile" name="Pdffile" required> 
       
        
        <Button type="submit" class="align" name="Update"> Update </Button> 
      
     </form>

     <?php 

        if(isset($_POST['Update'])){
       if(isset($_FILES['Pdffile'])){

        $location="exams/".$_FILES['Pdffile']['name'];
         $tempname=$_FILES['Pdffile']['tmp_name'];
    
         

         // Select file type
       $extension = strtolower(pathinfo($location,PATHINFO_EXTENSION));
         
       // Valid file extensions
       $extensions_arr = array("pdf" ,"docx");

       // Check extension
       if( in_array($extension,$extensions_arr)){
          move_uploaded_file($tempname,$location);

        $sql1= " SELECT `attempfile` FROM `student_attempt_exam` WHERE courseid='".$_GET['courseid']."' " ;
         $result = $conn->query($sql1);
            while($row = $result->fetch_assoc()) {
                
                $loc = $row['attempfile'] ;
                
              unlink($loc);

         } 
          
           $sql2=" UPDATE `student_attempt_exam` SET `attempfile`='".$location."' WHERE courseid ='".$_GET['courseid']."' " ;

            $conn->query($sql2);
     
       }else{
         echo '<script>alert("upload exam in pdf format")</script>';
       }
       
       }}
   

      ?>

 

   </div>

 </div>

</body>
</html> 