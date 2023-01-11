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
    <link rel="stylesheet" href="./css/Teacher.css" />
    <title>Teacher</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="side-bar">
        <div class="logo-name">
            <h1>Teacher Pannel</h1>
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
                 <?php echo $_SESSION['firstname'] ,$_SESSION['secondname']; ?>
            </div>
        </div>
        <div class="content">
            <div class="cards">
        <?php 
             $teacherid=$_SESSION['id'];

               $sql=" SELECT `courseid`, `coursename`,  `coursephoto` FROM `teacheraddcourse` WHERE teacher_id=".$teacherid." ";

                $result = $conn->query($sql);

               if($result->num_rows > 0){
               
            while($row = $result->fetch_assoc()) {

         ?>
             
             <div class="card">
                    <div class="box">
                        <img src="<?php echo $row['coursephoto']?>" height="200px" alt="Error">
                        <button onclick="window.location.href='checkCourse.php?courseid=<?php echo $row['courseid'] ?>'">Check Course</button>
                        <button onclick="window.location.href='teacheraddmdule.php?courseid=<?php echo $row['courseid'] ?>'">Module</button>
                       
                    </div>
                </div>

            <?php  
                }
               }

             ?>


                <div class="card">
                    <div class="box">
                        <a href="./TeacherAddcourse.php"> <img  src="./images/add.png"  alt="Error" ></a> 
                        <button class="size"  onclick="window.location.href='TeacherAddcourse.php'">Create New Course</button>
                    </div>
                    
                </div>
            </div>

        </div>



</body>

</html>