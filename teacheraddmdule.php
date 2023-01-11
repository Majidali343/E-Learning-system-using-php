<?php 
     session_start();
    include('db.php');
    $_SESSION['message']="";
    $_SESSION['message1']="";
 ?>

 <?php 

          
       if(isset($_FILES['file'])&&
         isset($_GET['courseid'])&&
         isset($_POST['modulename'])&&
          isset($_POST['coursename'])&&
          isset($_POST['description'])){
          
         $location="modulevideos/".$_FILES['file']['name'];
         $tempname=$_FILES['file']['tmp_name'];
    
         move_uploaded_file($tempname,$location);

         $courseid =$_GET['courseid'];
         $coursename=$_POST['coursename'];
         $modulename=$_POST['modulename'];
         $description=$_POST['description'];
  
        $maxsize = 50000000; // 50MB

     
       // Select file type
       $extension = strtolower(pathinfo($location,PATHINFO_EXTENSION));
         
       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($extension,$extensions_arr) ){

        if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
             $_SESSION['message'] = "File too large. File must be less than 50MB.";
       }else{
        $sql = " INSERT INTO `course_modules`( `module_week`, `module_video`, `module_name`, `module_description`, `courseid`) VALUES ('".$modulename."','".$location."','". $coursename."','".$description."','".$courseid."') " ; 

          $result=$conn->query($sql); 
          
          $id = $courseid;
          header("location:checkCourse.php?courseid={$id}");

       }
       }else{
          $_SESSION['message1'] = "Only upload videos.";
       } 
     }
        ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/teacheraddmodule.css">
    <title>Create Module</title>
</head>

<body>
    <div class="side-bar">
        <div class="logo-name">
            <h1>Create Modlue</h1>
        </div>
        <ul>
            <li><a href="./Teacher.php">Home</a></li>
            <li><a href="./TeacherAddcourse.php">Add Courses</a></li>
            <li><a href="./assesments.php">Exams and grades</a></li>
            <li><a href="./profile.php">My Profile</a></li>
            <li><a href="./Question.php">Online Support</a></li>
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

         <form method="post" action="#" enctype="multipart/form-data">
          
          <h2 class="align">Module week</h2>
            <input class="Course" type="text" name="modulename" id="modulename" placeholder=" Module Name" required>
            <br>

            <h2 class="align">Module Name</h2>
            <input class="Course" type="text" name="coursename" id="coursename" placeholder="Course Name" required>

            <h2 class="align" >Upload Video</h2>

            <label for="file">Select a Video:</label>

            <input type="file" id="file" name="file" required>
            <div id="message">

            <h4><?php echo $_SESSION['message'] ?></h4>
            <h4><?php echo $_SESSION['message1'] ?></h4>

            </div>
            
            <h2 class="align">Course Discription</h2>
            <textarea id="#" name="description" rows="8" cols="100" placeholder="Enter discription" required></textarea>  
            <br>
            <Button type="submit" class="align" >Save</Button>

         </form>
            
        </div>

       
</body>
<head>


</html>