

<?php
   session_start();
    include('db.php');


   if(isset($_GET['deletecourse'])){
       
       //// deleting from directory
     $sql1 = " SELECT  `coursephoto` FROM `teacheraddcourse` WHERE courseid = '".$_GET['deletecourse']."' " ;

       $result = $conn->query($sql1);

            if($result->num_rows > 0){
            
         while($row = $result->fetch_assoc()) {
                
                $loc = $row['coursephoto'] ;
                echo $loc ;
              unlink($loc);

         } }

     $sql= "DELETE FROM `teacheraddcourse` WHERE courseid = '".$_GET['deletecourse']."' " ;
   
     if($conn->query( $sql)===true){

      header("location:Teacher.php");
     }else{
      echo "not deleted";
     }
       

  


   }

  ?>