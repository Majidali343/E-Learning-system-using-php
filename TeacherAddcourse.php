<?php 
    session_start();
    include('db.php');
    
    if(isset($_FILES['file'])&&
      isset($_POST['course_name'])&&
      isset($_POST['course_description'])){
         $course_name=$_POST['course_name'];
         $course_description=$_POST['course_description'];

         $location="courseimages/".$_FILES['file']['name'];
         $tempname=$_FILES['file']['tmp_name'];
    
         move_uploaded_file($tempname,$location);
  
        $sql = " INSERT INTO `teacheraddcourse`( `coursename`, `coursediscription`, `coursephoto`, `teacher_id`) VALUES ('".$course_name."','".$course_description."','".$location."','".$_SESSION['id']."') ";

           $result=$conn->query($sql);
       }
 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/teacheraddcourse.css" />
    <title>Create Course</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="side-bar">
        <div class="logo-name">
            <h1>Create Course</h1>
        </div>
        <ul>
            <li><a href="./Teacher.php">Home</a></li>
            <li><a href="./TeacherAddcourse.php">Add Courses</a></li>
            <li><a href="./assesments.php">Exams and grades</a></li>
            <li><a href="./profile.php">My Profile</a></li>
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

            <form method="post" action="TeacherAddcourse.php" enctype="multipart/form-data">
            
            <h2 class="align">Course Name</h2>
            <input class="Course" name="course_name" type="text" placeholder="Course Name" required>

            <h2 class="align">Upload Photo</h2>

            <label for="myfile"></label>

            <input type="file"  name="file">

            <h2 class="align">Course Description</h2>

            <textarea id="#" name="course_description" rows="4" cols="50" placeholder="Enter description" required></textarea>
            <br>
            <Button class="align" onclick="window.location.href='Teacher.php' ">Save</Button>

            </form>
            
            
        </div>
    </div>
 
</body>

</html>