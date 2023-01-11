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
    <link rel="stylesheet" href="./css/assessments.css" />
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
                      <th>Exam ID</th>
                      <th>PAPER</th>
                      <th>COURSE Name</th>
                      <th>STUDENT NAME</th>
                      <th>NUMBERS</th>
                      <th>EDIT NUMBERS</th>
                    </tr>
                   </thead>
                   <tbody>
                    <?php
                 $sql ="SELECT student_attempt_exam.exam_id,student_attempt_exam.attempfile, teacheraddcourse.coursename, users.firstname, users.secondname,`grade` FROM `student_attempt_exam`
                      INNER JOIN users 
                      ON student_attempt_exam.studentid=users.id
                      INNER JOIN teacheraddcourse
                      ON student_attempt_exam.courseid=teacheraddcourse.courseid
                      where student_attempt_exam.teacherid ='".$_SESSION['id']."' " ;
                     
                     $result =$conn->query($sql);

                     while($row =$result->fetch_assoc()){
                        ?>
                       <tr>
                        
                       <td id="examid<?php echo $row['exam_id'] ?>"><?php echo $row['exam_id'] ?></td>
                       <td><a id="download" name="download" href="<?php echo "http://localhost/mb/".$row['attempfile'] ?>" > Download submission!</a></td>
                       <td><?php echo $row['coursename'] ?></td>
                       <td ><?php echo  $row['firstname'] . " " . $row['secondname'] ?></td>
                       <td id="gradeset<?php echo $row['exam_id'] ?>"><?php echo $row['grade'] ?></td>
                       <td> <input type="text" id="updategrade<?php echo $row['exam_id'] ?>" >
                           <br><br><button onclick="update(<?php echo $row['exam_id'] ;?>)">UPDATE </button>
                       </td>
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