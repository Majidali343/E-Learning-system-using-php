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
    <title>CheckCourse</title>
</head>
<div class="side-bar">
  <div class="logo-name">
      <h1>Add Module</h1>
  </div>
  <ul>
    <li><a href="./Teacher.php">Home</a></li>
    <li><a href="./TeacherAddcourse.php">Add Courses</a></li>
    <li><a href="./assesments.php">Exams and grades</a></li>
    <li><a href="./profile.php">My Profile</a></li>
    <li><a href="./viewstudents.php?Queriesid=<?php echo $_GET['courseid']?>">View Students</a></li>
    <li><a href="./Question.php?Queriesid=<?php echo $_GET['courseid']?>">Course Queries</a></li>
    <li ><a href="./logout.php">Logout</a></li>
  </ul>
</div>

<div class="container">
        <div class="header">
          <h5>E - Learning Website</h5>
            <div class="user">
                 <?php echo $_SESSION['firstname'],$_SESSION['secondname']; ?>
            </div>
        </div>
  <div class="content">

     <div id="deletecourse">
    

       <button onclick="window.location.href='teacherfunctions.php?deletecourse=<?php echo $_GET['courseid']?>' ; return ConfirmDelete(); " >Delete Course</button>  

     </div>
      
   
    <?php 
            
               $sql=" SELECT `module_id`, `module_week`, `module_video`, `module_name`, `module_description`, `courseid` FROM `course_modules` WHERE courseid='".$_GET['courseid']."' ";

                $result = $conn->query($sql);

               if($result->num_rows > 0){
               
            while($row = $result->fetch_assoc()) {

         ?>
           <div id="delete<?php echo $row['module_id'] ?>">
             
           
          <h1><?php echo $row['module_week'] ?></h1>
          <video src="<?php echo $row['module_video'] ?>" width="1000" height="340" controls>
           </video>
           <h2>
             <?php echo $row['module_name'] ?>
           </h2>
           <p>
              <?php echo $row['module_description']?>
           </p>
            <button onclick="deletemod(<?php echo $row['module_id'] ;?>)">Delete</button>
         <br>
           </div> 
            <?php  
                }
               }

             ?>

       <br>

      <form method="post" action="#" enctype="multipart/form-data">

        <label for="pdffile"><h2>Upload exam paper: </h2></label>
        
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
        $sql1= " SELECT `examfile` FROM `teacheruploadexam` WHERE course_id='".$_GET['courseid']."' " ;
         $result = $conn->query($sql1);
            if($result->num_rows > 0){
              echo '<script>alert("Exam uploaded click update button to update")</script>';
            }else{

          if( in_array($extension,$extensions_arr)){
          move_uploaded_file($tempname,$location);
          
          $sql ="INSERT INTO `teacheruploadexam`( `examfile`, `course_id`, `teacher_id`) VALUES ('".$location."','".$_GET['courseid']."','".$_SESSION['id']."') " ;

            $conn->query($sql);
            echo '<script>alert("Exam uploaded Sucessfully")</script>';

            }
             else{
         echo '<script>alert("upload exam in pdf format")</script>';
       }
       
       }}


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
       $extensions_arr = array("pdf" ,"word");

       // Check extension
       if( in_array($extension,$extensions_arr)){
          move_uploaded_file($tempname,$location);

        $sql1= " SELECT `examfile` FROM `teacheruploadexam` WHERE course_id='".$_GET['courseid']."' " ;
         $result = $conn->query($sql1);
            while($row = $result->fetch_assoc()) {
                
                $loc = $row['examfile'] ;
                
              unlink($loc);

         } 
          
           $sql2=" UPDATE `teacheruploadexam` SET `examfile`='".$location."' WHERE course_id='".$_GET['courseid']."' " ;

            $conn->query($sql2);
            echo '<script>alert("Exam updated Sucessfully")</script>';
     
       }else{
         echo '<script>alert("upload exam in pdf format")</script>';
       }
       
       }}
   

      ?>



   </div>

 </div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">


  function ConfirmDelete()
    {
      return confirm("Are you sure you want to delete?");
    }



 function deletemod(modid){
    var id=modid;

  $.post('deletemodule.php',{module_id:id},function(data){
    $('#delete'+id).hide('fast');
  });
   

 }

</script>

</body>

</html> 