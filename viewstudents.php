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
    <link rel="stylesheet" href="./css/viewstudents.css" />
    <title>Grading</title>
    
</head>

<body>
    <div class="side-bar">
        <div class="logo-name">
            <h1>Grading</h1>
        </div>
        <ul>
            <li><a href="./Teacher.php">Home</a></li>
            <li><a href="./TeacherAddcourse.php">Add Courses</a></li>
            <li><a href="./assesments.php">Exams and grades</a></li>
            <li><a href="./profile.php">My Profile</a></li>
            <li><a href="./view Students.php">View Students</a></li>
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
           

           <table border="3" id="mytable">
                  <thead>
                    <tr>
                      
                      <th>Student name</th>
                       <th>Student Email</th>
                      <th>Course Name</th>
                      

                    </tr>
                   </thead>
                   <tbody>
                    <?php
                    $sql =" SELECT users.firstname ,users.secondname , users.email,teacheraddcourse.coursename FROM `studentenrollcourse` 
                      INNER JOIN users 
                      ON studentenrollcourse.student_id=users.id 
                      INNER JOIN teacheraddcourse 
                      on teacheraddcourse.courseid=studentenrollcourse.courseid
                      WHERE studentenrollcourse.courseid = '".$_GET['Queriesid']."'  " ;
                     
                     $result =$conn->query($sql);

                     while($row =$result->fetch_assoc()){
                        ?>
                       <tr>
                        
                       
                       <td><?php echo $row['firstname'] . " " . $row['secondname'] ?></td>
                       <td ><?php echo $row['email'] ?></td>
                       <td ><?php echo $row['coursename'] ?></td>
                       
                     </tr>

                   <?php
                     }
                      ?>
                    

                  </tbody>
                </table> 

        </div>



</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    
   function update(id){
  

    // $('#mytable tbody tr').on('click', function  () {
    //         var id = $(this).children("td:eq(0)").text();
    //         alert(id);
    //     });
    var uniqid=id;

    var updategrade=$('#updategrade'+id).val();
    var examid=$('#examid'+id).text();

   
    
    $.post('UpdateGrade.php',{gradedata:updategrade ,examdata:examid},function(data){
      
      $("#gradeset"+id).text(data);
  });

   }

</script>

</html>